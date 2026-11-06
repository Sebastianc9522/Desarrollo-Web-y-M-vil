import os
import secrets
from datetime import datetime, timedelta, timezone
from fastapi import FastAPI, HTTPException, Header
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel

app = FastAPI(
    title="Craft & Beer - Authentication Service",
    description="Servicio de autenticación y emisión de tokens para el sistema Craft & Beer"
)

# Soporte CORS para el login desde el HTML
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Base de datos simulada
USERS = {
    "nicolas": {
        "password": "password123",
        "user_id": "C-001",
        "roles": ["cliente", "admin"]
    }
}

SESSIONS = {}
TOKEN_LIFETIME_MINUTES = 15

# Este secreto DEBE coincidir con el 'auth_introspection_secret' de Vault
AUTH_INTROSPECTION_SECRET = os.getenv("AUTH_INTROSPECTION_SECRET")

if not AUTH_INTROSPECTION_SECRET:
    raise RuntimeError("CRÍTICO: AUTH_INTROSPECTION_SECRET no está configurado.")

class LoginRequest(BaseModel):
    username: str
    password: str

class IntrospectionRequest(BaseModel):
    token: str

@app.post("/login")
def login(request: LoginRequest):
    user = USERS.get(request.username)
    if not user or user["password"] != request.password:
        raise HTTPException(status_code=401, detail="Credenciales incorrectas")
    
    access_token = secrets.token_urlsafe(32)
    expiration = datetime.now(timezone.utc) + timedelta(minutes=TOKEN_LIFETIME_MINUTES)
    
    SESSIONS[access_token] = {
        "user_id": user["user_id"],
        "username": request.username,
        "roles": user["roles"],
        "expires_at": expiration
    }
    
    return {
        "access_token": access_token,
        "token_type": "bearer",
        "expires_in": TOKEN_LIFETIME_MINUTES * 60
    }

@app.post("/introspect")
def introspect(request: IntrospectionRequest, x_gateway_auth_secret: str = Header(default="")):
    if not secrets.compare_digest(x_gateway_auth_secret, AUTH_INTROSPECTION_SECRET): 
        raise HTTPException(status_code=403, detail="Gateway no autorizado")
        
    session = SESSIONS.get(request.token)
    if not session or datetime.now(timezone.utc) > session["expires_at"]:
        SESSIONS.pop(request.token, None)
        return {"active": False}
        
    return {
        "active": True,
        "user_id": session["user_id"],
        "username": session["username"],
        "roles": session["roles"],
        "expires_at": session["expires_at"].isoformat()
    }