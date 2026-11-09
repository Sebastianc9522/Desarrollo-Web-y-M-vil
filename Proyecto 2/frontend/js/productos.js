// ==============================================
// CONFIGURACIÓN DE MICROSERVICIOS
// ==============================================
const GATEWAY_URL = "http://127.0.0.1:8000/api";
const AUTH_URL = "http://127.0.0.1:8100";

let inventario = [];
let carrito = [];
let tokenActual = null; // Almacenará el JWT temporalmente

// ==============================================
// 1. SISTEMA DE AUTENTICACIÓN (LOGIN)
// ==============================================
async function iniciarSesion(event) {
    // Evita que el formulario recargue la página
    if(event) event.preventDefault(); 
    
    // Obtenemos los valores de los inputs (ajustando los IDs según index.html)
    const emailInput = document.getElementById("loginEmail").value;
    const passwordInput = document.getElementById("loginPassword").value;
    
    // Extraemos el 'username' del email (ej: nicolas@ejemplo.com -> nicolas)
    const username = emailInput.split('@')[0];

    try {
        const respuesta = await fetch(`${AUTH_URL}/login`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                username: username,
                password: passwordInput
            })
        });

        if (!respuesta.ok) {
            throw new Error("Credenciales incorrectas");
        }

        const data = await respuesta.json();
        tokenActual = data.access_token; // Guardamos el token en memoria
        
        alert(`¡Bienvenido de vuelta, ${username}!`);
        
        // Cerramos el modal usando Bootstrap de forma limpia
        const modalElement = document.getElementById('loginModal');
        const modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) modal.hide();
        
        // Volvemos a cargar los productos ahora que estamos autenticados
        cargarProductos();
        
    } catch (error) {
        alert("Error al iniciar sesión: Verifica tu usuario o contraseña.");
        console.error("Error Auth:", error);
    }
}

// ==============================================
// 2. CARGA DE PRODUCTOS DESDE FASTAPI (GATEWAY)
// ==============================================
async function cargarProductos() {
    let contenedorGrilla = document.getElementById("contenedorProductos");
    
    // Si no estamos en la página de productos, no hacemos la petición (ej: index.html)
    if (!contenedorGrilla) return;
    
    // Si no hay token, pedimos iniciar sesión antes de mostrar el inventario
    if (!tokenActual) {
        contenedorGrilla.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fa fa-lock fa-4x text-muted mb-3"></i>
                <h4 class="text-dark">Debes iniciar sesión para ver el inventario de cervezas.</h4>
                <button class="btn btn-auth-solid mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Iniciar Sesión
                </button>
            </div>
        `;
        return;
    }

    try {
        // Hacemos fetch al Gateway enviando el Token Bearer
        const respuesta = await fetch(`${GATEWAY_URL}/productos`, {
            method: "GET",
            headers: {
                "Authorization": `Bearer ${tokenActual}`,
                "Content-Type": "application/json"
            }
        });

        if (!respuesta.ok) {
            throw new Error("No tienes permisos o tu sesión expiró");
        }

        const datosGateway = await respuesta.json();
        inventario = datosGateway.data; // Tomamos el array "data" que responde backend_api.py
        
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

    } catch (error) {
        console.error("Error Gateway:", error);
        contenedorGrilla.innerHTML = `<div class="col-12 text-center text-danger py-5"><h4>Error al cargar el inventario: ${error.message}</h4></div>`;
        tokenActual = null; // Borramos el token inválido
    }
}

// ==============================================
// 3. LÓGICA LOCAL DEL CARRITO Y STOCK (Sin Cambios)
// ==============================================
function editarStock(idProducto) {
    let producto = inventario.find(p => p.id === idProducto);
    if (producto) {
        let cantidadAdicional = prompt(`¿Cuántas unidades de "${producto.nombre}" deseas añadir al stock actual (${producto.stock})?`);
        let cantidadParsed = parseInt(cantidadAdicional);
        if (!isNaN(cantidadParsed) && cantidadParsed > 0) {
            producto.stock += cantidadParsed; 
            alert(`¡Stock actualizado! Nuevo stock de ${producto.nombre}: ${producto.stock}`);
            
            // Re-renderizamos los productos manualmente (ya que modificamos el array local)
            cargarProductosUI(); 
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
        cargarProductosUI(); 
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
        cargarProductosUI();
    }
}

// Función auxiliar para repintar la UI sin volver a llamar a FastAPI
function cargarProductosUI() {
    let contenedorGrilla = document.getElementById("contenedorProductos");
    if(!contenedorGrilla) return;
    
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