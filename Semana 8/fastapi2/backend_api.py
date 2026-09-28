import os
import secrets
from fastapi import FastAPI, Header, HTTPException, Depends

app = FastAPI(
    title="Craft & Beer - Backend API (ES)",
    description="API ubicada y enrutada por API gateway"
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

@app.get("/health")
def health():
    return {
        "status": "OK",
        "service": "Craft & Beer Backend API (ES)"
    }

@app.get("/productos", dependencies=[Depends(verify_gateway)])
def productos(x_authenticated_client: str | None = Header(default=None)):
    return {
        "authenticated_client": x_authenticated_client,
        "productos": [
            {"id": 1, "nombre": '"Hops & Glory" American IPA', "precio": 3500},
            {"id": 2, "nombre": '"Nebulosa" Hazy IPA', "precio": 4200},
            {"id": 3, "nombre": '"Doble Impacto" Double IPA', "precio": 4500},
            {"id": 4, "nombre": '"Despertar" Coffee Porter', "precio": 3500},
            {"id": 5, "nombre": '"Abismo" Imperial Stout', "precio": 4800},
            {"id": 6, "nombre": '"Oasis" Blonde Ale', "precio": 2800}
        ]
    }

@app.get("/ordenes", dependencies=[Depends(verify_gateway)])
def ordenes(x_authenticated_client: str | None = Header(default=None)):
    return {
        "authenticated_client": x_authenticated_client,
        "ordenes": [
            {"id": 1001, "status": "paid"},
            {"id": 1002, "status": "pending"}
        ]
    }