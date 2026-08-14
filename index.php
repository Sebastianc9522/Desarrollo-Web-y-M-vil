<!DOCTYPE html>
<html lang="es">
<head>
    <title>Armería - Página Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light text-dark">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="index.php">
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
                            <li><a class="dropdown-item" href="#">Misión y Visión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Catálogo / Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.php">Servicios y Mantenimiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                    <i class="fa fa-user me-1"></i> Acceder
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Banner de bienvenida) -->
    <div class="bg-dark text-white py-5 text-center shadow-lg border-bottom border-secondary" style="background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('https://via.placeholder.com/1200x400') center/cover;">
        <div class="container py-4">
            <h1 class="display-4 fw-bold">EQUIPAMIENTO Y MANTENIMIENTO ESPECIALIZADO</h1>
            <p class="lead text-secondary col-md-8 mx-auto">Soluciones profesionales en tiro deportivo, caza y accesorios de precisión con respaldo garantizado.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="productos.php" class="btn btn-warning btn-lg fw-semibold">Ver Productos</a>
                <a href="servicios.php" class="btn btn-outline-light btn-lg">Nuestros Servicios</a>
            </div>
        </div>
    </div>

    <!-- Contenido Principal: Categorías Destacadas -->
    <main class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Categorías Principales</h2>
            <p class="text-muted">Explora nuestro catálogo seleccionado para profesionales y aficionados</p>
        </div>

        <div class="row g-4">
            <!-- Tarjeta 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-secondary text-white text-center py-4 rounded-top">
                        <i class="fa fa-crosshairs fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Tiro Deportivo</h5>
                        <p class="card-text text-muted">Equipamiento de alta precisión calibrado para deportistas de competición.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="productos.php" class="btn btn-outline-dark btn-sm w-100">Explorar Categoria</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-secondary text-white text-center py-4 rounded-top">
                        <i class="fa fa-tree fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Caza y Aire Libre</h5>
                        <p class="card-text text-muted">Indumentaria, óptica y herramientas diseñadas para entornos exigentes.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="productos.php" class="btn btn-outline-dark btn-sm w-100">Explorar Categoria</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-secondary text-white text-center py-4 rounded-top">
                        <i class="fa fa-wrench fa-3x"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Taller y Mantenimiento</h5>
                        <p class="card-text text-muted">Servicio técnico certificado, reparación, limpieza y personalización.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="servicios.php" class="btn btn-outline-dark btn-sm w-100">Ver Servicios</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center text-md-between d-md-flex align-items-center">
            <div class="mb-2 mb-md-0">
                <small class="text-secondary">&copy; 2026 Armería - Todos los derechos reservados.</small>
            </div>
            <div>
                <a href="#" class="text-secondary me-3"><i class="fa fa-facebook"></i></a>
                <a href="#" class="text-secondary me-3"><i class="fa fa-instagram"></i></a>
                <a href="#" class="text-secondary"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <!-- Modal de Autenticación -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title"><i class="fa fa-lock me-2"></i>Iniciar Sesión</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="empresa.php">
                        <div class="mb-3">
                            <label for="email" class="form-label font-monospace">Correo Electrónico:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" placeholder="usuario@ejemplo.com" required name="email">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label font-monospace">Contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" id="pwd" placeholder="******" required name="pswd">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Recordar mi cuenta</label>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Ingresar <i class="fa fa-arrow-right ms-1"></i></button>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>