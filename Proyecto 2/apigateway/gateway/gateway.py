import os
import httpx
from fastapi import FastAPI, Depends, HTTPException, Request, Response
from fastapi.security import HTTPBearer, HTTPAuthorizationCredentials
from fastapi.middleware.cors import CORSMiddleware

app = FastAPI(
    title="Craft & Beer - Secure API Gateway",
    description="API Gateway con HashiCorp Vault y Auth Service integrados"
)

# Fundamental para que el JS de tus archivos HTML no sea bloqueado (CORS)
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

security = HTTPBearer(auto_error=False)

# Direcciones base (por defecto asumen que todo corre en localhost en sus respectivos puertos)
AUTH_SERVICE_URL = os.getenv("AUTH_SERVICE_URL", "http://127.0.0.1:8100")
VAULT_ADDR = os.getenv("VAULT_ADDR", "http://127.0.0.1:8200")
BACKEND_URL = os.getenv("BACKEND_URL", "http://127.0.0.1:9000")

# ¡El token de Vault es obligatorio!
VAULT_TOKEN = os.getenv("VAULT_TOKEN")

if not VAULT_TOKEN:
    raise RuntimeError("CRÍTICO: VAULT_TOKEN no está configurado.")

async def get_gateway_secrets():
    """Obtiene dinámicamente las contraseñas desde HashiCorp Vault"""
    url = f"{VAULT_ADDR}/v1/secret/data/gateway"
    headers = {"X-Vault-Token": VAULT_TOKEN}
    
    async with httpx.AsyncClient(timeout=5.0) as client:
        response = await client.get(url, headers=headers)
        
    if response.status_code != 200:
        raise HTTPException(status_code=500, detail="No fue posible conectarse o autenticarse con Vault")
        
    vault_response = response.json()
    # En KV v2 de Vault, los datos vienen anidados en data -> data
    return vault_response["data"]["data"]

async def authenticate_client(credentials: HTTPAuthorizationCredentials = Depends(security)):
    """Valida el token del usuario consultando al Auth Service"""
    if not credentials:
        raise HTTPException(status_code=401, detail="Bearer token requerido")
        
    # 1. Obtenemos los secretos desde Vault dinámicamente
    gateway_secrets = await get_gateway_secrets()
    introspection_secret = gateway_secrets["auth_introspection_secret"]
    
    try:
        # 2. Consultamos al Auth Service
        async with httpx.AsyncClient(timeout=5.0) as client:
            response = await client.post(
                f"{AUTH_SERVICE_URL}/introspect",
                json={"token": credentials.credentials},
                headers={"X-Gateway-Auth-Secret": introspection_secret}
            )
    except httpx.RequestError:
        raise HTTPException(status_code=502, detail="Error consultando al Auth Service")
        
    identity = response.json()
    
    if not identity.get("active", False):
        raise HTTPException(status_code=401, detail="Token inválido o expirado")
        
    # Si todo es correcto, devolvemos la identidad y pasamos el secreto del backend
    return {
        "client_id": "frontend-web",
        "user_id": identity["user_id"],
        "username": identity["username"],
        "roles": identity["roles"],
        "backend_secret": gateway_secrets["backend_shared_secret"]
    }

@app.api_route("/api/{path:path}", methods=["GET", "POST", "PUT", "PATCH", "DELETE"])
async def proxy(path: str, request: Request, auth=Depends(authenticate_client)):
    """Enruta todas las peticiones autorizadas hacia el Backend API"""
    target_url = f"{BACKEND_URL}/{path}"
    body = await request.body()
    
    # Inyectamos la seguridad extraída de Vault y la identidad del usuario para el backend
    gateway_headers = {
        "X-Gateway-Secret": auth["backend_secret"],
        "X-Authenticated-Client": auth["client_id"],
        "X-Authenticated-User": auth["username"],
        "X-Authenticated-Roles": ",".join(auth["roles"])
    }
    
    if "content-type" in request.headers:
        gateway_headers["content-type"] = request.headers["content-type"]
        
    try:
        async with httpx.AsyncClient(timeout=10.0) as client:
            upstream = await client.request(
                method=request.method,
                url=target_url,
                params=request.query_params,
                content=body,
                headers=gateway_headers
            )
    except httpx.RequestError:
        raise HTTPException(status_code=502, detail="Backend API no disponible")
        
    response_headers = {}
    if "content-type" in upstream.headers:
        response_headers["content-type"] = upstream.headers["content-type"]
        
    return Response(
        content=upstream.content,
        status_code=upstream.status_code,
        headers=response_headers
    )