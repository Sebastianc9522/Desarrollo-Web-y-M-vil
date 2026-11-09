workspace "CraftBeer" "Plataforma Craft & Beer" {

    !identifiers hierarchical

    model {
        visitante = person "Visitante" "Persona que consulta información pública en la web sin iniciar sesión."
        cliente = person "Cliente" "Usuario autenticado (ej. nicolas) que consulta productos y gestiona sus pedidos."

        sistema = softwareSystem "Plataforma Craft & Beer" "Sistema de catálogo de cervezas artesanales y gestión de pedidos." {
            tags "SistemaEvaluado"

            frontend = container "Frontend Web" "Interfaz estática y responsiva para visitantes y clientes." "HTML/JS/Bootstrap" {
                tags "Frontend"
            }

            apiGateway = container "API Gateway" "Punto de entrada al backend. Rutea peticiones y valida tokens JWT." "FastAPI (Puerto 8000)" {
                tags "Gateway"
                
                httpEntry = component "Router & CORS" "Recibe solicitudes HTTP del frontend (js/productos.js)." "Middleware"
                vaultClient = component "Cliente Vault" "Obtiene secretos dinámicamente para comunicarse con otros servicios." "httpx"
                authFilter = component "Filtro de Autenticación" "Intercepta la petición y solicita validación de token." "Depends"
                proxy = component "Proxy Dispatcher" "Inyecta credenciales seguras y redirige al Backend." "httpx"
            }

            authService = container "Auth Service" "Autentica usuarios, emite y valida tokens JWT." "FastAPI (Puerto 8100)" {
                tags "Seguridad"
                
                loginApi = component "API Login (/login)" "Recibe credenciales y emite Access Token." "Endpoint"
                introspectApi = component "API Introspect (/introspect)" "Valida la vigencia de un token a petición del Gateway." "Endpoint"
                userDbMock = component "Base de Usuarios" "Repositorio en memoria con roles y credenciales (Mock)." "Diccionario Python"
            }

            backendApi = container "Backend API" "Gestiona la lógica de negocio, inventario de cervezas y pedidos." "FastAPI (Puerto 9000)" {
                tags "Privado"
                
                gatewayValidator = component "Validador Gateway" "Exige y verifica el INTERNAL_GATEWAY_SECRET." "Depends"
                productosApi = component "API Productos (/productos)" "Retorna el inventario de cervezas." "Endpoint"
                pedidosApi = component "API Pedidos (/orders)" "Retorna y gestiona los pedidos." "Endpoint"
                dataMock = component "Almacén de Datos" "Persistencia en memoria del inventario y pedidos." "Diccionario Python"
            }

            secretManager = container "HashiCorp Vault" "Almacena de forma centralizada y segura los secretos (auth_introspection_secret, backend_shared_secret)." "Vault (Puerto 8200)" {
                tags "Seguridad"
            }
        }

        // Relaciones C1 y C2 (Nivel Contenedores)
        visitante -> sistema.frontend "Navega por la página" "Navegador Web"
        cliente -> sistema.frontend "Inicia sesión y consulta productos" "Navegador Web"
        
        sistema.frontend -> sistema.authService "Envía credenciales para login (POST /login)" "HTTP/JSON"
        sistema.frontend -> sistema.apiGateway "Solicita recursos inyectando JWT (GET /api/...)" "HTTP/JSON"
        
        sistema.apiGateway -> sistema.secretManager "Extrae llaves de seguridad en tiempo de ejecución" "HTTP (X-Vault-Token)"
        sistema.apiGateway -> sistema.authService "Solicita validación de token (POST /introspect)" "HTTP/JSON"
        sistema.apiGateway -> sistema.backendApi "Reenvía la petición validada inyectando roles y secretos" "HTTP/JSON"

        // Relaciones C3 - API Gateway
        sistema.frontend -> sistema.apiGateway.httpEntry "Inicia petición"
        sistema.apiGateway.httpEntry -> sistema.apiGateway.authFilter "Intercepta para autorizar"
        sistema.apiGateway.authFilter -> sistema.apiGateway.vaultClient "Requiere llaves"
        sistema.apiGateway.vaultClient -> sistema.secretManager "Conecta con la bóveda"
        sistema.apiGateway.authFilter -> sistema.authService "Llama a /introspect"
        sistema.apiGateway.authFilter -> sistema.apiGateway.proxy "Permite el paso de petición"
        sistema.apiGateway.proxy -> sistema.backendApi "Enruta al servicio destino"
        
        // Relaciones C3 - Auth Service
        sistema.frontend -> sistema.authService.loginApi "Envía formulario de login"
        sistema.authService.loginApi -> sistema.authService.userDbMock "Comprueba usuario y clave"
        sistema.apiGateway -> sistema.authService.introspectApi "Consulta estado del token"
        sistema.authService.introspectApi -> sistema.authService.userDbMock "Verifica roles"

        // Relaciones C3 - Backend API
        sistema.apiGateway.proxy -> sistema.backendApi.gatewayValidator "Ingresa petición del proxy"
        sistema.backendApi.gatewayValidator -> sistema.backendApi.productosApi "Petición autorizada"
        sistema.backendApi.gatewayValidator -> sistema.backendApi.pedidosApi "Petición autorizada"
        sistema.backendApi.productosApi -> sistema.backendApi.dataMock "Lee/Escribe datos"
        sistema.backendApi.pedidosApi -> sistema.backendApi.dataMock "Lee/Escribe datos"
    }

    views {
        systemContext sistema "C1_Contexto" "Contexto de Craft & Beer" {
            title "C1 - Contexto de la Plataforma Craft & Beer"
            include *
            autoLayout lr
        }

        container sistema "C2_Contenedores" "Microservicios de Craft & Beer" {
            title "C2 - Arquitectura de Microservicios"
            include *
            autoLayout lr
        }

        component sistema.apiGateway "C3_API_Gateway" "Componentes internos del API Gateway" {
            title "C3 - Componentes: API Gateway"
            include *
            autoLayout lr
        }

        component sistema.authService "C3_Auth_Service" "Componentes internos del Auth Service" {
            title "C3 - Componentes: Auth Service"
            include *
            autoLayout lr
        }

        component sistema.backendApi "C3_Backend_API" "Componentes internos del Backend API" {
            title "C3 - Componentes: Backend API"
            include *
            autoLayout lr
        }

        dynamic sistema "D_F01_Login" "Flujo de inicio de sesión directo al Auth Service" {
            title "Flujo Dinámico: Inicio de Sesión"
            1: cliente -> sistema.frontend "Ingresa usuario y contraseña en Modal"
            2: sistema.frontend -> sistema.authService "POST /login (js/productos.js)" "HTTP/JSON"
            3: sistema.authService -> sistema.frontend "Devuelve JWT (Access Token)" "HTTP/JSON"
            autoLayout lr
        }

        dynamic sistema "D_F02_Productos" "Flujo de consulta de productos a través del Gateway" {
            title "Flujo Dinámico: Consulta Segura de Productos"
            1: cliente -> sistema.frontend "Abre sección productos"
            2: sistema.frontend -> sistema.apiGateway "GET /api/productos inyectando JWT Bearer" "HTTP"
            3: sistema.apiGateway -> sistema.secretManager "Extrae auth_introspection_secret y backend_shared_secret" "HTTP"
            4: sistema.secretManager -> sistema.apiGateway "Devuelve secretos de forma segura" "HTTP/JSON"
            5: sistema.apiGateway -> sistema.authService "POST /introspect (envía JWT + secreto Vault)" "HTTP/JSON"
            6: sistema.authService -> sistema.apiGateway "Responde Token Válido, Identidad y Roles" "HTTP/JSON"
            7: sistema.apiGateway -> sistema.backendApi "GET /productos inyectando headers seguros" "HTTP/JSON"
            8: sistema.backendApi -> sistema.apiGateway "Devuelve catálogo de 6 cervezas" "HTTP/JSON"
            9: sistema.apiGateway -> sistema.frontend "Devuelve catálogo al cliente" "HTTP"
            autoLayout lr
        }

        styles {
            element "Person" {
                background #56718A
                color #FFFFFF
                shape person
            }
            element "SistemaEvaluado" {
                background #173B5D
                color #FFFFFF
                shape roundedbox
            }
            element "Container" {
                background #E3ECF5
                color #173B5D
                shape roundedbox
            }
            element "Frontend" {
                background #CDE5F7
                color #153E5B
                shape webbrowser
            }
            element "Gateway" {
                background #2B6289
                color #FFFFFF
            }
            element "Seguridad" {
                background #3F6171
                color #FFFFFF
            }
            element "Privado" {
                background #D5E8EF
                color #173B5D
            }
            element "Component" {
                shape roundedbox
                background #EDF3F7
                color #173B5D
            }
        }
    }
}