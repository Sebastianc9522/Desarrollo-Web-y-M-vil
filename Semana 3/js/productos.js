const responseAPI = {
    "status": 200,
    "message": "Productos obtenidos correctamente",
    "data": [
        { "id": "1", "nombre": "Mira Telescópica Táctica 4x32", "precio": 45900, "icono": "fa-crosshairs", "stock": 0 },
        { "id": "2", "nombre": "Kit de Limpieza Ultrasónica", "precio": 25000, "icono": "fa-tint", "stock": 0 },
        { "id": "3", "nombre": "Protector Auditivo Electrónico", "precio": 65000, "icono": "fa-headphones", "stock": 0 },
        { "id": "4", "nombre": "Funda de Retención Kydex", "precio": 32000, "icono": "fa-shield", "stock": 0 }
    ]
};

// Variables globales para mantener el estado de la página en memoria
let inventario = responseAPI.data; // Usaremos esto para poder modificar el stock
let carrito = []; // Arreglo vacío para el futuro paso del carrito

// Función que se ejecuta al cargar el <body>
function cargarProductos() {
    let cmb = document.getElementById("cmbProducto");
    cmb.innerHTML = ""; // Limpiamos antes de cargar por si actualizamos la vista
    
    let optDefault = document.createElement("option");
    optDefault.setAttribute("value", "");
    optDefault.innerText = "-- Seleccione un producto --";
    cmb.appendChild(optDefault);

    // Llenamos el select
    inventario.forEach((prod) => {
        let opt = document.createElement("option");
        opt.setAttribute("value", prod.id);
        opt.innerText = `${prod.nombre} - $${prod.precio}`; 
        cmb.appendChild(opt);                    
    });

    let contenedorGrilla = document.getElementById("contenedorProductos");
    contenedorGrilla.innerHTML = ""; // Limpiamos la grilla para poder redibujarla cuando el stock cambie
    
    // Dibujamos las tarjetas usando nuestro inventario global
    inventario.forEach((prod) => {
        let col = document.createElement("div");
        col.setAttribute("class", "col-md-3 mb-4");

        // Condicional simple para cambiar el color si no hay stock
        let colorStock = prod.stock > 0 ? "text-primary" : "text-danger";

        // Añadimos un id al botón y al texto del stock para facilitar las funciones futuras
        col.innerHTML = `
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center mt-3">
                    <i class="fa ${prod.icono} fa-3x text-warning mb-3"></i>
                    <h6 class="card-title fw-bold">${prod.nombre}</h6>
                    <p class="card-text text-success fw-bold fs-5 mb-1">$${prod.precio}</p>
                    <small class="fw-bold ${colorStock}">${prod.stock} Restantes</small>
                </div>
                <div class="card-footer bg-white border-0 text-center pb-3">
                    <button class="btn btn-dark btn-sm w-100 mb-2" onclick="agregarAlCarrito('${prod.id}')">
                        <i class="fa fa-cart-plus"></i> Agregar
                    </button>
                    <button class="btn btn-outline-secondary btn-sm w-100" onclick="editarStock('${prod.id}')">
                        <i class="fa fa-pencil"></i> Editar Stock
                    </button>
                </div>
            </div>
        `;
        contenedorGrilla.appendChild(col);
    });
}

function mostrarSeleccion() {
    let cmb = document.getElementById("cmbProducto");
    let alerta = document.getElementById("alertaSeleccion");
    
    if(cmb.value !== "") {
        let textoSeleccionado = cmb.options[cmb.selectedIndex].text;
        alerta.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle me-2"></i> Has seleccionado: <strong>${textoSeleccionado}</strong></div>`;
    } else {
        alerta.innerHTML = "";
    }
}

// Función para sumar stock a un producto específico
function editarStock(idProducto) {
    // Buscamos el producto específico dentro de nuestro arreglo "inventario"
    let producto = inventario.find(p => p.id === idProducto);
    
    if (producto) {
        // Desplegamos la ventana para pedir la cantidad
        let cantidadAdicional = prompt(`¿Cuántas unidades de "${producto.nombre}" deseas añadir al stock actual (${producto.stock})?`);
        
        // Transformamos el texto ingresado a un número entero
        let cantidadParsed = parseInt(cantidadAdicional);
        
        // Validamos que el usuario haya escrito un número mayor a 0
        if (!isNaN(cantidadParsed) && cantidadParsed > 0) {
            producto.stock += cantidadParsed; // Sumamos la cantidad
            alert(`¡Stock actualizado! Nuevo stock de ${producto.nombre}: ${producto.stock}`);
            
            // Volvemos a llamar a la función principal para redibujar la grilla con los nuevos datos
            cargarProductos(); 
        } else if (cantidadAdicional !== null) {
            // Si escribió letras o un número negativo (y no le dio a cancelar)
            alert("Por favor, ingresa un número válido mayor a 0.");
        }
    }
}

// Función para agregar un producto al carrito y descontar stock
function agregarAlCarrito(idProducto) {
    // 1. Buscamos el producto en el inventario
    let producto = inventario.find(p => p.id === idProducto);

    // 2. Verificamos que el producto exista y tenga stock disponible
    if (producto && producto.stock > 0) {
        
        // 3. Descontamos 1 unidad del stock general
        producto.stock -= 1;

        // 4. Revisamos si el producto YA existe en nuestro arreglo del carrito
        let itemEnCarrito = carrito.find(item => item.id === idProducto);
        
        if (itemEnCarrito) {
            // Si ya estaba, solo le sumamos 1 a la cantidad que llevamos
            itemEnCarrito.cantidad += 1;
        } else {
            // Si no estaba, lo agregamos como un objeto nuevo al carrito con cantidad 1
            carrito.push({
                id: producto.id,
                nombre: producto.nombre,
                precio: producto.precio,
                cantidad: 1
            });
        }

        // 5. Mostramos el mensaje que pediste
        alert(`¡Se añadió 1 "${producto.nombre}" al carro!`);

        // 6. Volvemos a dibujar la pantalla para que el stock se actualice visualmente
        cargarProductos(); 

    } else {
        // Mensaje de error si intenta agregar un producto con 0 stock (como la Funda Kydex)
        alert("¡Lo sentimos! No hay stock disponible de este producto.");
    }
}

// Función para dibujar el carrito de compras en la ventana lateral
function renderizarCarrito() {
    let contenedorCarrito = document.getElementById("contenidoCarrito");
    let totalElemento = document.getElementById("totalCarrito");
    contenedorCarrito.innerHTML = ""; // Limpiamos el contenedor
    let total = 0;

    // Si no hay productos, mostramos un mensaje
    if (carrito.length === 0) {
        contenedorCarrito.innerHTML = "<p class='text-center text-muted'>Tu carrito está vacío.</p>";
        totalElemento.innerText = "$0";
        return;
    }

    // Iteramos sobre los productos del carrito
    carrito.forEach((item) => {
        let subtotal = item.precio * item.cantidad; // Calculamos valor de cantidad * precio
        total += subtotal; // Sumamos al gran total

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

    // Actualizamos el total a pagar en la parte inferior del carrito
    totalElemento.innerText = `$${total}`;
}

// Función para eliminar 1 unidad del carrito y devolverla al stock
function eliminarDelCarrito(idProducto) {
    // Buscamos el producto en nuestro carrito
    let itemIndex = carrito.findIndex(p => p.id === idProducto);

    if (itemIndex !== -1) {
        let item = carrito[itemIndex];
        
        // Restamos 1 a la cantidad del carrito
        item.cantidad -= 1;

        // Si la cantidad llega a 0, lo eliminamos completamente del carrito
        if (item.cantidad === 0) {
            carrito.splice(itemIndex, 1);
        }

        // Buscamos el producto en el inventario general y le devolvemos 1 al stock
        let productoInventario = inventario.find(p => p.id === idProducto);
        if (productoInventario) {
            productoInventario.stock += 1;
        }

        // Redibujamos ambas interfaces para que el usuario vea el cambio inmediato
        renderizarCarrito();
        cargarProductos();
    }
}