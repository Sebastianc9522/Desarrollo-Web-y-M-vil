from fastapi import FastAPI

app = FastAPI(
    title="Craft & Beer - Backend API (ES)",
    description="API ubicada y enrutada por API gateway"
)

@app.get("/health")
def health():
    return {
        "status": "OK",
        "service": "Craft & Beer Backend API (ES)"
    }

@app.get("/productos")
def productos():
    return {
        "productos": [
            {"id": 1, "nombre": '"Hops & Glory" American IPA', "precio": 3500},
            {"id": 2, "nombre": '"Nebulosa" Hazy IPA', "precio": 4200},
            {"id": 3, "nombre": '"Doble Impacto" Double IPA', "precio": 4500},
            {"id": 4, "nombre": '"Despertar" Coffee Porter', "precio": 3500},
            {"id": 5, "nombre": '"Abismo" Imperial Stout', "precio": 4800},
            {"id": 6, "nombre": '"Oasis" Blonde Ale', "precio": 2800}
        ]
    }

@app.get("/ordenes")
def ordenes():
    return {
        "ordenes": [
            {"id": 1001, "status": "paid"},
            {"id": 1002, "status": "pending"}
        ]
    }