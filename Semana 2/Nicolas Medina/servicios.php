<!DOCTYPE html>
<html lang="es">
<head>
    <title>Servicios - Hogar & Confort</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

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
                    <li class="nav-item"><a class="nav-link" href="productos.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link active fw-bold" href="servicios.php">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="carrito.php" class="btn btn-outline-light me-2 position-relative"><i class="fa fa-shopping-cart"></i> <span class="badge bg-warning text-dark">3</span></a>
                    <button class="btn btn-warning fw-bold" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user me-1"></i> Acceder</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Principal -->
    <header class="bg-white py-5 border-bottom text-center">
        <div class="container">
            <span class="badge bg-warning text-dark mb-2 px-3 py-2">Soluciones Integrales</span>
            <h1 class="fw-bold display-5">Servicios Profesionales para tu Hogar</h1>
            <p class="lead text-muted mx-auto" style="max-width: 650px;">Te acompañamos desde la elección del diseño hasta la instalación completa en tu espacio.</p>
        </div>
    </header>

    <!-- Grilla de Servicios -->
    <main class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Servicio 1 -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-row align-items-start gap-3">
                    <div class="bg-warning bg-opacity-20 p-3 rounded text-warning fs-3"><i class="fa fa-pencil-square-o"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1">Diseño & Decoración de Interiores</h5>
                        <p class="text-muted small mb-2">Asesoría personalizada con diseñadores expertos para optimizar la distribución, colores y estilo de tus habitaciones.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark fw-bold">Consultar diseño</a>
                    </div>
                </div>
            </div>
            <!-- Servicio 2 -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-row align-items-start gap-3">
                    <div class="bg-warning bg-opacity-20 p-3 rounded text-warning fs-3"><i class="fa fa-wrench"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1">Armado e Instalación a Domicilio</h5>
                        <p class="text-muted small mb-2">Equipo técnico especializado para armar muebles, fijar repisas e instalar lámparas de forma rápida y segura.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark fw-bold">Agendar armado</a>
                    </div>
                </div>
            </div>
            <!-- Servicio 3 -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-row align-items-start gap-3">
                    <div class="bg-warning bg-opacity-20 p-3 rounded text-warning fs-3"><i class="fa fa-truck"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1">Despacho Programado & Express</h5>
                        <p class="text-muted small mb-2">Envíos con monitoreo en tiempo real. Selecciona el día y rango horario que mejor se acomode a tu agenda.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark fw-bold">Ver cobertura</a>
                    </div>
                </div>
            </div>
            <!-- Servicio 4 -->
            <div class="col">
                <div class="card h-100 border-0 shadow-sm p-4 d-flex flex-row align-items-start gap-3">
                    <div class="bg-warning bg-opacity-20 p-3 rounded text-warning fs-3"><i class="fa fa-cogs"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1">Proyectos y Muebles a Medida</h5>
                        <p class="text-muted small mb-2">Fabricación de cocinas, clósets y libreros personalizados adaptados a las dimensiones exactas de tu hogar.</p>
                        <a href="contacto.php" class="btn btn-sm btn-outline-dark fw-bold">Cotizar proyecto</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner Cotización rápida -->
        <div class="bg-dark text-white rounded-3 p-4 mt-5 text-center text-md-start d-md-flex justify-content-between align-items-center shadow-sm">
            <div>
                <h5 class="fw-bold mb-1 text-warning"><i class="fa fa-calculator me-2"></i>¿Necesitas un presupuesto personalizado?</h5>
                <p class="small text-secondary mb-0">Escríbenos y un ejecutivo responderá en menos de 24 horas hábiles.</p>
            </div>
            <a href="contacto.php" class="btn btn-warning fw-bold btn-sm mt-3 mt-md-0 px-4 py-2">Solicitar Cotización</a>
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
