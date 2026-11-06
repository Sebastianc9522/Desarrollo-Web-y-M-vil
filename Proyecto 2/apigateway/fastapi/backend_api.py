import os
import secrets
from fastapi import FastAPI, Header, HTTPException, Depends

app = FastAPI(
    title="Craft & Beer - Backend API",
    description="API ubicada y enrutada por API Gateway para inventario de cervezas"
)

INTERNAL_GATEWAY_SECRET = os.getenv("INTERNAL_GATEWAY_SECRET")

if not INTERNAL_GATEWAY_SECRET:
    raise RuntimeError("CRÍTICO: INTERNAL_GATEWAY_SECRET no está configurado en el entorno.")

def verificar_gateway(x_gateway_secret: str = Header(default="")):
    valid = secrets.compare_digest(x_gateway_secret, INTERNAL_GATEWAY_SECRET)
    if not valid:
        raise HTTPException(
            status_code=403,
            detail="Solicitud no autorizada desde Gateway"
        )

@app.get("/health", dependencies=[Depends(verificar_gateway)])
def health(x_authenticated_client: str | None = Header(default=None)):
    return {
        "authenticated_client": x_authenticated_client,
        "status": "OK",
        "service": "Craft & Beer Backend API"
    }

@app.get("/productos", dependencies=[Depends(verificar_gateway)])
def productos(
    x_authenticated_client: str | None = Header(default=None),
    x_authenticated_user: str | None = Header(default=None),
    x_authenticated_roles: str | None = Header(default=None)
):
    """Retorna el inventario de cervezas de la tienda para el frontend JS"""
    return {
        "identidad": {
            "cliente_id": x_authenticated_client,
            "usuario": x_authenticated_user,
            "roles": x_authenticated_roles
        },
        "data": [
            { "id": "1", "nombre": '"Hops & Glory" American IPA', "precio": 3500, "imagen": "img/Producto 1.png", "clase": "tarjeta-prod1", "stock": 10 },
            { "id": "2", "nombre": '"Nebulosa" Hazy IPA', "precio": 4200, "imagen": "img/Producto 2.png", "clase": "tarjeta-prod1", "stock": 15 },
            { "id": "3", "nombre": '"Doble Impacto" Double IPA', "precio": 4500, "imagen": "img/Producto 3.png", "clase": "tarjeta-prod1", "stock": 8 },
            { "id": "4", "nombre": '"Despertar" Coffee Porter', "precio": 3500, "imagen": "img/Producto 4.png", "clase": "tarjeta-prod3", "stock": 12 },
            { "id": "5", "nombre": '"Abismo" Imperial Stout', "precio": 4800, "imagen": "img/Producto 5.png", "clase": "tarjeta-prod3", "stock": 5 },
            { "id": "6", "nombre": '"Oasis" Blonde Ale', "precio": 2800, "imagen": "img/Producto 6.png", "clase": "tarjeta-prod2", "stock": 20 }
        ]
    }