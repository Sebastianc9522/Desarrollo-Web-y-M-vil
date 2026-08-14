<!DOCTYPE html>
<html lang="es">
<head>
    <title>Catálogo de Productos - Hogar & Confort</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fa fa-home text-warning me-2"></i>Hogar & Confort</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Empresa</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="empresa.php">Nuestra Empresa</a></li>
                            <li><a class="dropdown-item" href="empresa.php#equipo">Nuestro Equipo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="productos.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="carrito.php" class="btn btn-outline-light me-2 position-relative"><i class="fa fa-shopping-cart"></i> <span class="badge bg-warning text-dark">3</span></a>
                    <button class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user me-1"></i> Acceder</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Carrusel Promocional -->
    <section class="container my-3">
        <div id="demo" class="carousel slide rounded-3 overflow-hidden shadow-sm" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&h=300&q=80" class="d-block w-100 object-fit-cover" alt="Sala">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded">
                        <h4 class="text-warning fw-bold m-0">Especial Muebles de Sala - 25% OFF</h4>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&h=300&q=80" class="d-block w-100 object-fit-cover" alt="Cocina">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded">
                        <h4 class="text-warning fw-bold m-0">Renueva tu Cocina esta Temporada</h4>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
        </div>
    </section>

    <!-- Main Content: Filtros + Productos -->
    <main class="container my-4">
        <div class="row g-4">
            <!-- Sidebar Filtros -->
            <aside class="col-lg-3">
                <div class="bg-white p-3 rounded border shadow-sm">
                    <h6 class="fw-bold mb-3"><i class="fa fa-filter text-warning me-2"></i>Filtros</h6>
                    <hr class="my-2">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Categorías</label>
                        <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">Cocina & Menaje</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">Dormitorio</label></div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" checked><label class="form-check-label small">Sala & Decoración</label></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Precio Máximo</label>
                        <input type="range" class="form-range" min="5000" max="100000">
                    </div>
                    <button class="btn btn-dark w-100 btn-sm"><i class="fa fa-search me-1"></i> Filtrar</button>
                </div>
            </aside>

            <!-- Grilla de Productos -->
            <section class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center bg-white p-2 px-3 rounded border shadow-sm mb-3">
                    <span class="text-muted small">Mostrando 4 productos</span>
                    <select class="form-select form-select-sm w-auto">
                        <option>Más Populares</option>
                        <option>Menor a Mayor Precio</option>
                    </select>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <!-- Producto 1 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=300&q=80" class="card-img-top" alt="Sábanas">
                            <div class="card-body p-2 d-flex flex-column">
                                <span class="text-muted small">Dormitorio</span>
                                <h6 class="card-title fw-bold my-1 fs-6">Sábanas Algodón</h6>
                                <p class="fw-bold mb-2 text-dark mt-auto">$19.990</p>
                                <button class="btn btn-outline-dark btn-sm w-100"><i class="fa fa-cart-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1507473885765-e6ed057f782c?auto=format&fit=crop&w=300&q=80" class="card-img-top" alt="Lámpara">
                            <div class="card-body p-2 d-flex flex-column">
                                <span class="text-muted small">Decoración</span>
                                <h6 class="card-title fw-bold my-1 fs-6">Lámpara Nórdica</h6>
                                <p class="fw-bold mb-2 text-dark mt-auto">$35.000</p>
                                <button class="btn btn-outline-dark btn-sm w-100"><i class="fa fa-cart-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1583778176476-4a8b02a64c01?auto=format&fit=crop&w=300&q=80" class="card-img-top" alt="Sartenes">
                            <div class="card-body p-2 d-flex flex-column">
                                <span class="text-muted small">Cocina</span>
                                <h6 class="card-title fw-bold my-1 fs-6">Set Sartenes (3p)</h6>
                                <p class="fw-bold mb-2 text-dark mt-auto">$28.500</p>
                                <button class="btn btn-outline-dark btn-sm w-100"><i class="fa fa-cart-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                    <!-- Producto 4 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=300&q=80" class="card-img-top" alt="Cojín">
                            <div class="card-body p-2 d-flex flex-column">
                                <span class="text-muted small">Sala</span>
                                <h6 class="card-title fw-bold my-1 fs-6">Cojín Decorativo</h6>
                                <p class="fw-bold mb-2 text-dark mt-auto">$8.990</p>
                                <button class="btn btn-outline-dark btn-sm w-100"><i class="fa fa-cart-plus"></i> Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center text-md-start">
            <div class="row g-3">
                <div class="col-md-6">
                    <h6 class="fw-bold text-warning"><i class="fa fa-home me-2"></i>Hogar & Confort</h6>
                    <p class="small text-secondary mb-0">Todo lo necesario para hacer de tu hogar un espacio único.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small text-secondary mb-1">&copy; 2026 Hogar & Confort SpA.</p>
                    <a href="#" class="text-white me-2"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="text-white"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Acceso -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white py-2">
                    <h6 class="modal-title"><i class="fa fa-sign-in me-2"></i>Acceso</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-3">
                    <form action="empresa.php" method="POST">
                        <div class="mb-2">
                            <label class="form-label small mb-1">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small mb-1">Contraseña</label>
                            <input type="password" class="form-control form-control-sm" name="pswd" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 btn-sm fw-bold">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>