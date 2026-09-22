const responseAPI = {
    "status": 200,
    "message": "Productos obtenidos correctamente",
    "data": [
        { "id": "1", "nombre": "\"Hops & Glory\" American IPA", "precio": 3500, "imagen": "img/Producto 1.png", "clase": "tarjeta-prod1", "stock": 0 },
        { "id": "2", "nombre": "\"Nebulosa\" Hazy IPA", "precio": 4200, "imagen": "img/Producto 2.png", "clase": "tarjeta-prod1", "stock": 0 },
        { "id": "3", "nombre": "\"Doble Impacto\" Double IPA", "precio": 4500, "imagen": "img/Producto 3.png", "clase": "tarjeta-prod1", "stock": 0 },
        { "id": "4", "nombre": "\"Despertar\" Coffee Porter", "precio": 3500, "imagen": "img/Producto 4.png", "clase": "tarjeta-prod3", "stock": 0 },
        { "id": "5", "nombre": "\"Abismo\" Imperial Stout", "precio": 4800, "imagen": "img/Producto 5.png", "clase": "tarjeta-prod3", "stock": 0 },
        { "id": "6", "nombre": "\"Oasis\" Blonde Ale", "precio": 2800, "imagen": "img/Producto 6.png", "clase": "tarjeta-prod2", "stock": 0 }
    ]
};

let inventario = responseAPI.data;
let carrito = [];

function cargarProductos() {
    let contenedorGrilla = document.getElementById("contenedorProductos");
    contenedorGrilla.innerHTML = ""; 
    
    inventario.forEach((prod) => {
        let col = document.createElement("div");
        col.setAttribute("class", "col-md-4"); 

        let colorStock = prod.stock > 0 ? "text-success" : "text-danger";

        col.innerHTML = `
            <div class="product-card ${prod.clase} shadow-sm position-relative">
                <img src="${prod.imagen}" alt="${prod.nombre}">
                <div class="w-100 text-center mt-3">
                    <h5 class="fw-bold mb-1">${prod.nombre}</h5>
                    <p class="fw-bold fs-5 mb-2">$${prod.precio}</p>
                    <small class="fw-bold bg-light px-2 py-1 rounded shadow-sm d-inline-block mb-3 ${colorStock}">${prod.stock} Restantes</small>
                </div>
                <div class="w-100 d-flex gap-2 justify-content-center">
                    <!-- Botones actualizados con las nuevas clases de color -->
                    <button class="btn btn-accion-solid btn-sm w-50 shadow-sm" onclick="agregarAlCarrito('${prod.id}')">
                        <i class="fa fa-cart-plus"></i> Añadir
                    </button>
                    <button class="btn btn-accion-outline btn-sm w-50 shadow-sm" onclick="editarStock('${prod.id}')">
                        <i class="fa fa-pencil"></i> Stock
                    </button>
                </div>
            </div>
        `;
        contenedorGrilla.appendChild(col);
    });
}

function editarStock(idProducto) {
    let producto = inventario.find(p => p.id === idProducto);
    if (producto) {
        let cantidadAdicional = prompt(`¿Cuántas unidades de "${producto.nombre}" deseas añadir al stock actual (${producto.stock})?`);
        let cantidadParsed = parseInt(cantidadAdicional);
        if (!isNaN(cantidadParsed) && cantidadParsed > 0) {
            producto.stock += cantidadParsed; 
            alert(`¡Stock actualizado! Nuevo stock de ${producto.nombre}: ${producto.stock}`);
            cargarProductos(); 
        } else if (cantidadAdicional !== null) {
            alert("Por favor, ingresa un número válido mayor a 0.");
        }
    }
}

function agregarAlCarrito(idProducto) {
    let producto = inventario.find(p => p.id === idProducto);
    if (producto && producto.stock > 0) {
        producto.stock -= 1;
        let itemEnCarrito = carrito.find(item => item.id === idProducto);
        if (itemEnCarrito) {
            itemEnCarrito.cantidad += 1;
        } else {
            carrito.push({
                id: producto.id,
                nombre: producto.nombre,
                precio: producto.precio,
                cantidad: 1
            });
        }
        alert(`¡Se añadió 1 "${producto.nombre}" al carro!`);
        cargarProductos(); 
    } else {
        alert("¡Lo sentimos! No hay stock disponible de este producto.");
    }
}

function renderizarCarrito() {
    let contenedorCarrito = document.getElementById("contenidoCarrito");
    let totalElemento = document.getElementById("totalCarrito");
    contenedorCarrito.innerHTML = ""; 
    let total = 0;

    if (carrito.length === 0) {
        contenedorCarrito.innerHTML = "<p class='text-center text-muted'>Tu carrito está vacío.</p>";
        totalElemento.innerText = "$0";
        return;
    }

    carrito.forEach((item) => {
        let subtotal = item.precio * item.cantidad; 
        total += subtotal; 

        let row = document.createElement("div");
        row.setAttribute("class", "d-flex justify-content-between align-items-center border-bottom pb-3 mb-3");
        row.innerHTML = `
            <div>
                <h6 class="mb-0 fw-bold">${item.nombre}</h6>
                <small class="text-muted">${item.cantidad} unidad(es) x $${item.precio}</small>
            </div>
            <div class="text-end">
                <span class="fw-bold d-block text-success mb-1">$${subtotal}</span>
                <button class="btn btn-sm btn-outline-danger" onclick="eliminarDelCarrito('${item.id}')">
                    <i class="fa fa-trash"></i> Quitar 1
                </button>
            </div>
        `;
        contenedorCarrito.appendChild(row);
    });
    totalElemento.innerText = `$${total}`;
}

function eliminarDelCarrito(idProducto) {
    let itemIndex = carrito.findIndex(p => p.id === idProducto);
    if (itemIndex !== -1) {
        let item = carrito[itemIndex];
        item.cantidad -= 1;
        if (item.cantidad === 0) {
            carrito.splice(itemIndex, 1);
        }
        let productoInventario = inventario.find(p => p.id === idProducto);
        if (productoInventario) {
            productoInventario.stock += 1;
        }
        renderizarCarrito();
        cargarProductos();
    }
}