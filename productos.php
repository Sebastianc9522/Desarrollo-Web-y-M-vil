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
                        <a class="nav-link active fw-bold text-warning" href="productos.php">Catálogo / Productos</a>
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

    <!-- Carrusel de Destacados / Promociones -->
    <section class="bg-dark py-4 text-white">
        <div class="container">
            <div id="demo" class="carousel slide rounded shadow overflow-hidden" data-bs-ride="carousel">

                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- Slides del carrusel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white p-5" style="min-height: 250px;">
                            <div class="text-center">
                                <span class="badge bg-warning text-dark mb-2">Destacado</span>
                                <h3 class="fw-bold">Óptica y Miras Teleféricas</h3>
                                <p>Alta precisión para tiro a larga distancia. Descuentos de temporada.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex align-items-center justify-content-center bg-dark text-white p-5 border border-secondary" style="min-height: 250px;">
                            <div class="text-center">
                                <span class="badge bg-danger mb-2">Nuevo</span>
                                <h3 class="fw-bold">Equipamiento Táctico Profesional</h3>
                                <p>Chalecos, mochilas de transporte y estuches rígidos de alta resistencia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex align-items-center justify-content-center bg-secondary text-white p-5" style="min-height: 250px;">
                            <div class="text-center">
                                <span class="badge bg-success mb-2">Servicio</span>
                                <h3 class="fw-bold">Kits de Limpieza y Mantenimiento</h3>
                                <p>Mantén tu equipo en óptimas condiciones con nuestros insumos certificados.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Galería de Productos -->
    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
            <h2 class="fw-bold"><i class="fa fa-shopping-bag me-2"></i>Catálogo Disponible</h2>
            <span class="text-muted">Mostrando 6 productos</span>
        </div>

        <div class="row g-4">
            <!-- Producto 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-crosshairs fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Óptica</span>
                        <h5 class="card-title fw-bold">Mira Telescópica 4x32</h5>
                        <p class="card-text text-muted small">Resistente al agua y golpes. Retículo iluminado para baja visibilidad.</p>
                        <h6 class="fw-bold text-dark mt-3">$120.000 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-briefcase fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Accesorios</span>
                        <h5 class="card-title fw-bold">Estuche Rígido Polímero</h5>
                        <p class="card-text text-muted small">Protección con espuma pre-cortada personalizable e interior hermético.</p>
                        <h6 class="fw-bold text-dark mt-3">$45.000 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-wrench fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Mantenimiento</span>
                        <h5 class="card-title fw-bold">Kit De Limpieza Multicalibre</h5>
                        <p class="card-text text-muted small">Incluye baquetas de bronce, cepillos de cerda, parches y aceites protectores.</p>
                        <h6 class="fw-bold text-dark mt-3">$28.900 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
                    </div>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-shield fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Protección</span>
                        <h5 class="card-title fw-bold">Protectores Auditivos Electrónicos</h5>
                        <p class="card-text text-muted small">Reducción de ruido ambiental superior a 82dB con amplificación de voz.</p>
                        <h6 class="fw-bold text-dark mt-3">$65.000 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
                    </div>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-eye fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Seguridad</span>
                        <h5 class="card-title fw-bold">Lentes de Protección Balística</h5>
                        <p class="card-text text-muted small">Policarbonato anti-rayaduras con protección UV400 y cristales intercambiables.</p>
                        <h6 class="fw-bold text-dark mt-3">$18.500 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
                    </div>
                </div>
            </div>

            <!-- Producto 6 -->
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="bg-dark text-white text-center py-5 rounded-top">
                        <i class="fa fa-compass fa-4x text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Outdoor</span>
                        <h5 class="card-title fw-bold">Mochila Táctica Modular 35L</h5>
                        <p class="card-text text-muted small">Sistema MOLLE exterior, tela impermeabilizada de alta densidad.</p>
                        <h6 class="fw-bold text-dark mt-3">$52.000 CLP</h6>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-info-circle me-1"></i> Ver Detalle</button>
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