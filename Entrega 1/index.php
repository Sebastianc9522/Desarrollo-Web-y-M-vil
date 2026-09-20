<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craft & Beer - Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* Paleta de colores extraída del boceto */
        :root {
            --bg-principal: #FAECD9;       
            --color-titulos: #E6A15C;      
            --color-hero: #D78B2A;         
            --color-prod1: #F1D08A;        
            --color-prod3: #4B2E1C;        
            --borde-general: #C18735;      
            --texto-oscuro: #333333;
        }

        body {
            background-color: var(--bg-principal);
            color: var(--texto-oscuro);
            border: 8px solid var(--borde-general); 
            min-height: 100vh;
            margin: 0;
            padding: 10px;
        }

        /* Estilos de cabecera */
        .logo-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid var(--borde-general);
            object-fit: cover;
            background-color: var(--color-prod1); 
        }

        .barra-busqueda {
            border: 2px solid var(--borde-general);
            background-color: var(--bg-principal);
        }
        .barra-busqueda:focus {
            border-color: var(--color-hero);
            box-shadow: none;
        }

        /* Botones de Registro / Inicio de sesión */
        .btn-auth-outline {
            border: 2px solid var(--borde-general);
            background-color: transparent;
            color: var(--texto-oscuro);
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-auth-outline:hover {
            background-color: var(--borde-general);
            color: white;
        }
        .btn-auth-solid {
            border: 2px solid var(--borde-general);
            background-color: var(--color-titulos);
            color: var(--texto-oscuro);
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-auth-solid:hover {
            background-color: var(--color-hero);
            color: var(--texto-oscuro);
            transform: scale(1.02);
        }

        /* Estilos para los Modales */
        .modal-content-custom {
            border: 4px solid var(--borde-general);
            background-color: var(--bg-principal);
            border-radius: 8px;
        }
        .input-modal {
            border: 2px solid var(--borde-general);
            background-color: var(--bg-principal);
        }
        .input-modal:focus {
            border-color: var(--color-hero);
            box-shadow: none;
        }

        /* Barra divisoria gruesa */
        .divisor-principal {
            border-top: 4px solid var(--borde-general);
            margin: 20px 0;
            opacity: 1;
        }

        /* Botones de navegación con animación arreglada */
        .nav-btn {
            background-color: var(--bg-principal);
            border: 2px solid var(--borde-general);
            color: var(--texto-oscuro);
            font-weight: 500;
            transition: 0.3s; 
        }
        .nav-btn:hover {
            transform: scale(1.02); 
            color: var(--texto-oscuro); 
            background-color: var(--bg-principal); 
            border-color: var(--borde-general); 
        }
        .nav-btn.btn-activo {
            background-color: var(--color-titulos);
            font-weight: bold;
        }
        .nav-btn.btn-activo:hover {
            background-color: var(--color-titulos); 
            border-color: var(--borde-general);
        }

        /* Hero Section */
        .hero-section {
            background-color: var(--color-hero);
            border: 2px solid var(--borde-general);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px; 
        }
        .hero-section img {
            width: 85%; 
            max-width: 900px;
            height: auto; 
            object-fit: contain; 
            border-radius: 4px; 
        }

        /* Tarjetas de Producto */
        .product-card {
            border: 2px solid var(--borde-general);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: var(--texto-oscuro);
            padding: 20px;
            height: 350px;
            transition: 0.3s;
        }
        .product-card:hover {
            transform: scale(1.02);
            color: inherit;
        }
        .product-card img {
            width: 100%;
            height: 220px;
            object-fit: contain;
        }
        
        /* Colores específicos de cada tarjeta */
        .tarjeta-prod1 { background-color: var(--color-prod1); }
        .tarjeta-prod2 { background-color: var(--color-hero); }
        .tarjeta-prod3 { 
            background-color: var(--color-prod3); 
            color: white !important; 
        }

        /* Footer */
        .footer-custom {
            border-top: 4px solid var(--borde-general);
            padding-top: 20px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- Cabecera -->
    <header class="container-fluid pt-3 pb-1">
        <div class="row align-items-center">
            <!-- Izquierda: Logo y Título desactivados (sin enlace) -->
            <div class="col-md-4">
                <div class="d-inline-flex align-items-center gap-3">
                    <img src="img/Logo.png" alt="Logo Craft & Beer" class="logo-circle shadow-sm">
                    <h1 class="m-0 fw-bold display-6 text-dark tracking-wide">Craft & Beer</h1>
                </div>
            </div>
            
            <!-- Centro: Barra de búsqueda alineada a la izquierda -->
            <div class="col-md-4 d-flex justify-content-center">
                <div class="input-group w-75 shadow-sm">
                    <input type="text" class="form-control barra-busqueda text-start ps-3" placeholder="Barra de búsqueda">
                </div>
            </div>

            <!-- Derecha: Botones de Sesión y Registro con activadores de Modal -->
            <div class="col-md-4 d-flex justify-content-end gap-2 pe-4">
                <button class="btn btn-auth-outline shadow-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <i class="fa fa-sign-in me-1"></i> Iniciar Sesión
                </button>
                <button class="btn btn-auth-solid shadow-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#registroModal">
                    <i class="fa fa-user-plus me-1"></i> Registro
                </button>
            </div>
        </div>
    </header>

    <div class="divisor-principal"></div>

    <!-- Barra de Botones -->
    <nav class="container-fluid mb-4">
        <div class="d-flex justify-content-center gap-4">
            <a href="productos.php" class="btn nav-btn px-5 py-2 shadow-sm">Productos</a>
            <a href="eventos.php" class="btn nav-btn px-5 py-2 shadow-sm">Eventos</a>
            <a href="soporte.php" class="btn nav-btn px-5 py-2 shadow-sm">Soporte</a>
        </div>
    </nav>

    <div class="divisor-principal"></div>

    <!-- Imagen de la empresa + Slogan -->
    <section class="container-fluid mb-4">
        <div class="hero-section shadow-sm">
            <img src="img/Empresa+Slogan.png" alt="Empresa y Slogan Craft & Beer" class="shadow-sm">
        </div>
    </section>

    <!-- Productos -->
    <main class="container-fluid mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <a href="productos.php" class="product-card tarjeta-prod1 shadow-sm">
                    <img src="img/Producto 1.png" alt="Cervezas IPAs">
                    <h5 class="fw-bold mt-3 text-center">"Hops & Glory" American IPA</h5>
                </a>
            </div>
            
            <div class="col-md-4">
                <a href="productos.php" class="product-card tarjeta-prod2 shadow-sm">
                    <img src="img/Producto 2.png" alt="Cervezas Stouts y Porters">
                    <h5 class="fw-bold mt-3 text-center">"Nebulosa" Hazy IPA</h5>
                </a>
            </div>
            
            <div class="col-md-4">
                <a href="productos.php" class="product-card tarjeta-prod3 shadow-sm">
                    <img src="img/Producto 3.png" alt="Cervezas Pale Ales y Blondes">
                    <h5 class="fw-bold mt-3 text-center">"Doble Impacto" Double IPA</h5>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="container-fluid footer-custom mt-4">
        <div class="row text-center text-md-start align-items-center pb-2">
            <div class="col-md-2 mb-2 mb-md-0">
                <h6 class="mb-0 fw-bold">Craft & Beer</h6>
            </div>
            <div class="col-md-3 mb-2 mb-md-0">
                <p class="mb-0"><i class="fa fa-map-marker me-2"></i>Santiago, Antonio Varas</p>
            </div>
            <div class="col-md-3 mb-2 mb-md-0">
                <p class="mb-0"><i class="fa fa-phone me-2"></i>+56 9 6767 6767</p>
            </div>
            <div class="col-md-2 mb-2 mb-md-0">
                <p class="mb-0"><i class="fa fa-instagram me-2"></i>@Craft & Beer</p>
            </div>
            <div class="col-md-2 text-md-end text-center">
                <h6 class="mb-0 fw-bold"><i class="fa fa-copyright"></i> 2026</h6>
            </div>
        </div>
    </footer>

    <!-- ============================================== -->
    <!-- MODALES (Ventanas Emergentes) -->
    <!-- ============================================== -->

    <!-- Modal Iniciar Sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom shadow">
                <div class="modal-header border-bottom border-warning">
                    <h5 class="modal-title fw-bold text-dark" id="loginModalLabel"><i class="fa fa-sign-in me-2"></i>Bienvenido de nuevo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="index.php">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label fw-bold">Correo Electrónico:</label>
                            <input type="email" class="form-control input-modal py-2" id="loginEmail" placeholder="usuario@ejemplo.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="loginPassword" class="form-label fw-bold">Contraseña:</label>
                            <input type="password" class="form-control input-modal py-2" id="loginPassword" placeholder="********" required>
                        </div>
                        <button type="submit" class="btn btn-auth-solid w-100 py-2 fs-5 shadow-sm">
                            Ingresar <i class="fa fa-arrow-right ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Registro -->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-custom shadow">
                <div class="modal-header border-bottom border-warning">
                    <h5 class="modal-title fw-bold text-dark" id="registroModalLabel"><i class="fa fa-user-plus me-2"></i>Únete a Craft & Beer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="index.php">
                        <div class="mb-3">
                            <label for="regNombre" class="form-label fw-bold">Nombre Completo:</label>
                            <input type="text" class="form-control input-modal py-2" id="regNombre" placeholder="Ej: Nicolas Medina" required>
                        </div>
                        <div class="mb-3">
                            <label for="regEmail" class="form-label fw-bold">Correo Electrónico:</label>
                            <input type="email" class="form-control input-modal py-2" id="regEmail" placeholder="usuario@ejemplo.com" required>
                        </div>
                        <div class="mb-4">
                            <label for="regPassword" class="form-label fw-bold">Contraseña:</label>
                            <input type="password" class="form-control input-modal py-2" id="regPassword" placeholder="Crea una contraseña segura" required>
                        </div>
                        <button type="submit" class="btn btn-auth-solid w-100 py-2 fs-5 shadow-sm">
                            Crear Cuenta <i class="fa fa-check ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>