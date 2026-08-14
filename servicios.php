<!DOCTYPE html>
<html lang="es">
<head>
    <title>Armería - Servicios Especializados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light text-dark">

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
                            <li><a class="dropdown-item" href="#">Misión y Visión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Catálogo / Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-warning" href="servicios.php">Servicios y Mantenimiento</a>
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

    <!-- Encabezado / Banner de Servicios -->
    <section class="bg-dark text-white py-5 text-center shadow-sm">
        <div class="container">
            <h1 class="display-5 fw-bold"><i class="fa fa-wrench text-warning me-2"></i>TALLER Y SERVICIOS TÉCNICOS</h1>
            <p class="lead text-secondary col-md-8 mx-auto">Contamos con armeros certificados y equipamiento de precisión para garantizar la máxima seguridad y rendimiento de tus equipos.</p>
        </div>
    </section>

    <!-- Sección de Servicios -->
    <main class="container my-5">
        <div class="row g-4">
            <!-- Servicio 1 -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 d-flex flex-row p-3 align-items-center">
                    <div class="bg-dark text-white p-4 rounded-3 text-center me-3" style="min-width: 90px;">
                        <i class="fa fa-cog fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Mantenimiento Preventivo y Limpieza Ultrasónica</h5>
                        <p class="text-muted small mb-2">Desarmado completo, eliminación de residuos con tina de ultrasonido, lubricación de precisión y verificación técnica.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark">Solicitar Cotización</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 2 -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 d-flex flex-row p-3 align-items-center">
                    <div class="bg-dark text-white p-4 rounded-3 text-center me-3" style="min-width: 90px;">
                        <i class="fa fa-crosshairs fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Calibración y Montaje de Óptica</h5>
                        <p class="text-muted small mb-2">Montaje profesional de miras telescópicas, collimación por láser y alineación para asegurar agrupadura óptima.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark">Solicitar Cotización</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 3 -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 d-flex flex-row p-3 align-items-center">
                    <div class="bg-dark text-white p-4 rounded-3 text-center me-3" style="min-width: 90px;">
                        <i class="fa fa-paint-brush fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Personalización y Acabados Cerakote</h5>
                        <p class="text-muted small mb-2">Recubrimientos cerámicos de alta resistencia a corrosión y abrasión con acabados tácticos o personalizados.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark">Solicitar Cotización</a>
                    </div>
                </div>
            </div>

            <!-- Servicio 4 -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0 d-flex flex-row p-3 align-items-center">
                    <div class="bg-dark text-white p-4 rounded-3 text-center me-3" style="min-width: 90px;">
                        <i class="fa fa-balance-scale fa-2x text-warning"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Asesoría Legal y Tramitación</h5>
                        <p class="text-muted small mb-2">Acompañamiento integral en la orientación sobre permisos, inscripciones y normativa vigente.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark">Consultar Asesoría</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner de Garantía/Atención -->
        <div class="bg-white p-4 mt-5 rounded shadow-sm border-start border-4 border-warning d-md-flex align-items-center justify-content-between">
            <div>
                <h5 class="fw-bold mb-1"><i class="fa fa-check-circle text-success me-2"></i>¿Necesitas un diagnóstico o evaluación?</h5>
                <p class="text-muted mb-0 small">Trae tu equipo a nuestra sucursal para un chequeo inicial con nuestros especialistas.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="contacto.php" class="btn btn-dark">Agendar Cita</a>
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