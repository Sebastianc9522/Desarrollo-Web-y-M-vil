import os
import secrets

from fastapi import (
    FastAPI,
    Header,
    HTTPException,
    Depends
)

app = FastAPI(
    title="Craft & Beer - Backend API",
    description="API ubicada y enrutada por API gateway para inventario de cervezas y pedidos"
)

INTERNAL_GATEWAY_SECRET = os.getenv("INTERNAL_GATEWAY_SECRET")

if not INTERNAL_GATEWAY_SECRET:
    raise RuntimeError("INTERNAL_GATEWAY_SECRET no esta configurado")

def verify_gateway(x_gateway_secret: str = Header(default="")):
    valid = secrets.compare_digest(x_gateway_secret, INTERNAL_GATEWAY_SECRET)
    if not valid:
        raise HTTPException(
            status_code=403,
            detail="Solicitud no autorizada desde Gateway"
        )

@app.get(
    "/health",
    dependencies=[Depends(verify_gateway)]
)
def health(
    x_authenticated_client: str | None = Header(default=None)
):
    return {
        "authenticated_client": x_authenticated_client,
        "status": "OK",
        "service": "Craft & Beer Backend API"
    }

@app.get(
    "/products",
    dependencies=[Depends(verify_gateway)]
)
def products(
    x_authenticated_client: str | None = Header(default=None),
    x_authenticated_user: str | None = Header(default=None),
    x_authenticated_roles: str | None = Header(default=None)
):
    return {
        "identity": {
            "client_id": x_authenticated_client,
            "username": x_authenticated_user,
            "roles": x_authenticated_roles
        },
        "products": [
            {"id": 1, "name": '"Hops & Glory" American IPA', "price": 3500},
            {"id": 2, "name": '"Nebulosa" Hazy IPA', "price": 4200},
            {"id": 3, "name": '"Doble Impacto" Double IPA', "price": 4500},
            {"id": 4, "name": '"Despertar" Coffee Porter', "price": 3500},
            {"id": 5, "name": '"Abismo" Imperial Stout', "price": 4800},
            {"id": 6, "name": '"Oasis" Blonde Ale', "price": 2800}
        ]
    }

@app.get(
    "/orders",
    dependencies=[Depends(verify_gateway)]
)
def orders(
    x_authenticated_client: str | None = Header(default=None),
    x_authenticated_user: str | None = Header(default=None),
    x_authenticated_roles: str | None = Header(default=None)
):
    return {
        "identity": {
            "client_id": x_authenticated_client,
            "username": x_authenticated_user,
            "roles": x_authenticated_roles
        },
        "orders": [
            {"id": 1001, "status": "paid"},
            {"id": 1002, "status": "pending"}
        ]
    }