<!DOCTYPE html>
<html lang="es">
<head>
    <title>Armería - Catálogo de Productos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Conexión de nuestro script modularizado -->
    <script src="js/productos.js"></script>
</head>

<body class="bg-light text-dark" onload="cargarProductos();">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-uppercase" href="index.php">
                <i class="fa fa-shield me-2"></i>ARMERÍA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Empresa</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="empresa.php">Nuestra Empresa</a></li>
                            <li><a class="dropdown-item" href="#">Nuestro Equipo</a></li>
                            <li><a class="dropdown-item" href="#">Misión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-warning" href="productos.php">Catálogo / Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <!-- NUEVO: Botón para abrir el carrito -->
                <button class="btn btn-outline-warning d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#carritoOffcanvas" onclick="renderizarCarrito()">
                    <i class="fa fa-shopping-cart me-2"></i> Ver Carrito
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <h2 class="fw-bold mb-4 border-bottom border-warning pb-2">Catálogo de Productos</h2>
        
        <!-- Sección del Combobox (Select) -->
        <div class="row bg-white p-4 rounded shadow-sm mb-5">
            <div class="col-md-6">
                <label for="cmbProducto" class="form-label fw-bold">Filtrar/Seleccionar Producto Rápido:</label>
                <select id="cmbProducto" name="cmbProducto" class="form-select border-dark" onchange="mostrarSeleccion();"></select>
            </div>
            <div class="col-md-6 d-flex align-items-end mt-3 mt-md-0" id="alertaSeleccion">
                <!-- Aquí se inyecta la alerta vía JS -->
            </div>
        </div>

        <!-- Grilla de Productos -->
        <div class="row" id="contenedorProductos">
            <!-- Los elementos se inyectarán aquí mediante JS -->
        </div>
    </main>

    <!-- NUEVO: Ventana lateral (Offcanvas) para el Carrito de Compras -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="carritoOffcanvas" aria-labelledby="carritoOffcanvasLabel">
        <div class="offcanvas-header bg-dark text-white">
            <h5 class="offcanvas-title fw-bold" id="carritoOffcanvasLabel"><i class="fa fa-shopping-cart me-2"></i> Mi Carrito</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Aquí inyectaremos los productos del carrito vía JS -->
            <div id="contenidoCarrito">
                <p class="text-center text-muted">Tu carrito está vacío.</p>
            </div>
        </div>
        <div class="offcanvas-footer p-3 border-top bg-light">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Total:</h5>
                <h5 class="fw-bold text-success mb-0" id="totalCarrito">$0</h5>
            </div>
            <button class="btn btn-success w-100 fw-bold"><i class="fa fa-credit-card me-2"></i> Pagar Ahora</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <small class="text-secondary">&copy; 2026 Armería - Todos los derechos reservados.</small>
        </div>
    </footer>

</body>
</html>