<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Hogar & Confort - Todo para tu casa</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <!-- Bootstrap 5 JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="bg-light">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">
                    <i class="fa fa-home text-warning me-2"></i>Hogar & Confort
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Categorías</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="productos.php?cat=cocina">Cocina & Menaje</a></li>
                                <li><a class="dropdown-item" href="productos.php?cat=dormitorio">Dormitorio</a></li>
                                <li><a class="dropdown-item" href="productos.php?cat=sala">Sala de Estar</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="productos.php?cat=decoracion">Decoración</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.php">Ofertas <span class="badge bg-danger">New</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contacto</a>
                        </li>
                    </ul>

                    <!-- Botones de Acción (Carrito y Login) -->
                    <div class="d-flex align-items-center gap-2">
                        <a href="carrito.php" class="btn btn-outline-light me-2 position-relative">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                                3
                            </span>
                        </a>
                        <button type="button" class="btn btn-warning text-dark fw-bold" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fa fa-user me-1"></i> Acceder
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Banner Principal (Hero Section) -->
        <header class="py-5 bg-white border-bottom mb-4">
            <div class="container my-3">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <span class="badge bg-warning text-dark mb-2 px-3 py-2">Colección Verano 2026</span>
                        <h1 class="display-4 fw-bold text-dark">Renueva la calidez de tu hogar</h1>
                        <p class="lead text-muted my-3">
                            Encuentra todo en decoración, textiles y utensilios de cocina con hasta un 30% de descuento.
                        </p>
                        <a href="#destacados" class="btn btn-dark btn-lg me-2"><i class="fa fa-shopping-bag me-2"></i>Ver Productos</a>
                        <a href="empresa.php" class="btn btn-outline-secondary btn-lg">Conócenos</a>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block text-center">
                        <img src="https://images.unsplash.com/photo-1616046229478-9901c5536a45?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded-4 shadow-sm" alt="Decoración de Hogar">
                    </div>
                </div>
            </div>
        </header>

        <!-- Barra de Beneficios -->
        <section class="container mb-5">
            <div class="row text-center g-3">
                <div class="col-md-4">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <i class="fa fa-truck fa-2x text-warning mb-2"></i>
                        <h5 class="fw-bold mb-1">Envíos a Todo el País</h5>
                        <p class="text-muted small mb-0">Gratis por compras sobre $30.000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <i class="fa fa-lock fa-2x text-warning mb-2"></i>
                        <h5 class="fw-bold mb-1">Pago 100% Seguro</h5>
                        <p class="text-muted small mb-0">Tarjetas de crédito, débito y transferencias</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-white border rounded shadow-sm">
                        <i class="fa fa-undo fa-2x text-warning mb-2"></i>
                        <h5 class="fw-bold mb-1">Garantía de Satisfacción</h5>
                        <p class="text-muted small mb-0">30 días para cambios o devoluciones</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Catálogo / Productos Destacados -->
        <main class="container mb-5" id="destacados">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold m-0"><i class="fa fa-star text-warning me-2"></i>Productos Destacados</h2>
                <a href="productos.php" class="text-decoration-none fw-bold text-dark">Ver todos los productos &rarr;</a>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                
                <!-- Producto 1 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <span class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 m-2 rounded small fw-bold">-20%</span>
                        <img src="https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Juego de Sábanas">
                        <div class="card-body d-flex flex-column">
                            <span class="text-muted small">Dormitorio</span>
                            <h5 class="card-title fw-bold fs-6 mt-1">Juego de Sábanas 100% Algodón</h5>
                            <div class="text-warning mb-2">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
                            </div>
                            <div class="mt-auto">
                                <p class="mb-2"><span class="text-muted text-decoration-line-through me-2">$24.990</span><strong class="fs-5 text-dark">$19.990</strong></p>
                                <button class="btn btn-outline-dark w-100 btn-sm"><i class="fa fa-cart-plus me-1"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Producto 2 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Lámpara de Pie">
                        <div class="card-body d-flex flex-column">
                            <span class="text-muted small">Decoración</span>
                            <h5 class="card-title fw-bold fs-6 mt-1">Lámpara de Pie Nórdica Madera</h5>
                            <div class="text-warning mb-2">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <div class="mt-auto">
                                <p class="mb-2"><strong class="fs-5 text-dark">$35.000</strong></p>
                                <button class="btn btn-outline-dark w-100 btn-sm"><i class="fa fa-cart-plus me-1"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Producto 3 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1583778176476-4a8b02a64c01?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Set Sartenes">
                        <div class="card-body d-flex flex-column">
                            <span class="text-muted small">Cocina</span>
                            <h5 class="card-title fw-bold fs-6 mt-1">Set Sartenes Antiadherentes (3 pzas)</h5>
                            <div class="text-warning mb-2">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                            </div>
                            <div class="mt-auto">
                                <p class="mb-2"><strong class="fs-5 text-dark">$28.500</strong></p>
                                <button class="btn btn-outline-dark w-100 btn-sm"><i class="fa fa-cart-plus me-1"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Producto 4 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        <span class="position-absolute top-0 end-0 bg-warning text-dark px-2 py-1 m-2 rounded small fw-bold">Popular</span>
                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Cojín Decorativo">
                        <div class="card-body d-flex flex-column">
                            <span class="text-muted small">Sala de Estar</span>
                            <h5 class="card-title fw-bold fs-6 mt-1">Cojín Decorativo Texturizado</h5>
                            <div class="text-warning mb-2">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                            </div>
                            <div class="mt-auto">
                                <p class="mb-2"><strong class="fs-5 text-dark">$8.990</strong></p>
                                <button class="btn btn-outline-dark w-100 btn-sm"><i class="fa fa-cart-plus me-1"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white pt-5 pb-4">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h5 class="fw-bold text-warning mb-3"><i class="fa fa-home me-2"></i>Hogar & Confort</h5>
                        <p class="small text-secondary">Especialistas en brindarte los mejores productos para convertir cada espacio de tu casa en un hogar único y acogedor.</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-3">Enlaces Rápidos</h5>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><a href="empresa.php" class="text-secondary text-decoration-none">Sobre Nosotros</a></li>
                            <li class="mb-2"><a href="productos.php" class="text-secondary text-decoration-none">Catálogo Completo</a></li>
                            <li class="mb-2"><a href="servicios.php" class="text-secondary text-decoration-none">Políticas de Envío</a></li>
                            <li class="mb-2"><a href="contacto.php" class="text-secondary text-decoration-none">Atención al Cliente</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-3">Síguenos</h5>
                        <div class="d-flex gap-3 fs-5 mb-3">
                            <a href="#" class="text-white"><i class="fa fa-facebook-square"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="text-white"><i class="fa fa-pinterest"></i></a>
                        </div>
                        <p class="small text-secondary m-0">&copy; 2026 Hogar & Confort SpA. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal de Autenticación -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title"><i class="fa fa-sign-in me-2"></i>Iniciar Sesión</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="empresa.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label font-weight-bold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" placeholder="ejemplo@correo.com" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña" name="pswd" required>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small" for="remember">
                                    Recordar mis datos
                                </label>
                            </div>
                            <button type="submit" class="btn btn-warning w-100 fw-bold">Ingresar <i class="fa fa-arrow-right ms-1"></i></button>
                        </form>
                    </div>
                    <div class="modal-footer bg-light">
                        <small class="text-muted me-auto">¿No tienes cuenta? <a href="#" class="text-dark fw-bold">Regístrate</a></small>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>