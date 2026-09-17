from fastapi import FastAPI

app = FastAPI(
    title="Craft & Beer - Backend API",
    description="API ubicada y enrutada por API gateway"
)

@app.get("/health")
def health():
    return {
        "status": "OK",
        "service": "Craft & Beer Backend API"
    }

@app.get("/products")
def products():
    return {
        "products": [
            {"id": 1, "name": '"Hops & Glory" American IPA', "price": 3500},
            {"id": 2, "name": '"Nebulosa" Hazy IPA', "price": 4200},
            {"id": 3, "name": '"Doble Impacto" Double IPA', "price": 4500},
            {"id": 4, "name": '"Despertar" Coffee Porter', "price": 3500},
            {"id": 5, "name": '"Abismo" Imperial Stout', "price": 4800},
            {"id": 6, "name": '"Oasis" Blonde Ale', "price": 2800}
        ]
    }

@app.get("/orders")
def orders():
    return {
        "orders": [
            {"id": 1001, "status": "paid"},
            {"id": 1002, "status": "pending"}
        ]
    }