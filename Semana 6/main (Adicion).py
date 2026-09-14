# ==========================================
# EndPoints (AQUÍ EMPIEZAN LOS CAMBIOS)
# ==========================================

@app.get("/health", tags=["sistema"])
def health():
    return {"status": "ok"}

# --- SECCIÓN ITEMS (Todos agrupados en una sola casilla) ---

@app.get("/items", response_model=List[ItemOut], tags=["items"])
async def listar_items(
    q: Optional[str] = Query(None, description="Filtro por nombre que contenga q"),
    skip: int = Query(0, ge=0),
    limit: int = Query(50, ge=1, le=200)
):
    query = {}
    if q:
        query["nombre"] = {"$regex": q, "$options": "i"}
    cursor = coll.find(query).skip(skip).limit(limit)
    items: List[ItemOut] = []
    async for doc in cursor:
        items.append(doc_to_itemout(doc))
    return items

@app.post("/items", response_model=ItemOut, status_code=201, tags=["items"])
async def crear_item(item: ItemIn):
    res = await coll.insert_one(item.model_dump())
    doc = await coll.find_one({"_id": res.inserted_id})
    return doc_to_itemout(doc)

# http://localhost: 8098/items/2
@app.get("/items/{item_id}", response_model=ItemOut, status_code=200, tags=["items"])
async def obtener_item(item_id: str):
    if not ObjectId.is_valid(item_id):
        raise HTTPException(400, "id invalido")
    doc = await coll.find_one({"_id": ObjectId(item_id)})
    if not doc:
        raise HTTPException(404, "Item no encontrado")
    return doc_to_itemout(doc)

@app.put("/items/{item_id}", response_model=ItemOut, tags=["items"])
async def actualizar_item(item_id: str, item: ItemIn):
    if not ObjectId.is_valid(item_id):
        raise HTTPException(400, "id invalido")
    res = await coll.update_one(
        {"_id": ObjectId(item_id)},
        {"$set": item.model_dump()}
    )
    if res.matched_count == 0:
        raise HTTPException(404, "Item no encontrado")
    doc = await coll.find_one({"_id": ObjectId(item_id)})
    return doc_to_itemout(doc)

@app.delete("/items/{item_id}", status_code=204, tags=["items"])
async def eliminar_item(item_id: str):
    if not ObjectId.is_valid(item_id):
        raise HTTPException(400, "id invalido")
    res = await coll.delete_one({"_id": ObjectId(item_id)})
    if res.deleted_count == 0:
        raise HTTPException(404, "Item no encontrado")
    return None

# --- NUEVAS CASILLAS PARA PRACTICAR ---

@app.get("/usuarios", tags=["usuarios"])
def listar_usuarios_dummy():
    """
    Este endpoint creará una nueva casilla llamada 'usuarios'
    en la documentación de Swagger.
    """
    return [
        {"id": 1, "username": "admin", "activo": True},
        {"id": 2, "username": "invitado", "activo": False}
    ]

@app.get("/reportes/ventas", tags=["reportes"])
def reporte_ventas_dummy():
    """
    Este endpoint creará otra casilla nueva llamada 'reportes'.
    """
    return {"total_ventas": 1500, "moneda": "USD", "mes": "Octubre"}