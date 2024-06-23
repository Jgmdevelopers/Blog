<?php
class Router {
    public function __construct() {
        
        // Obtiene la parte de la URL después del dominio (si existe) y elimina cualquier barra inclinada final
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        // Si la URL está vacía, redirige al método redirectToHome()
        if (empty($url)) {
            $this->redirectToHome();
            return;
        }

        // Filtra y sanea la URL para eliminar caracteres no deseados
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Divide la URL en segmentos usando "/" como delimitador
        $url = explode('/', $url);
        // Obtiene el nombre del controlador a partir del primer segmento de la URL
        $controllerName = ucfirst(array_shift($url)) . 'Controller';
        // Determina el método a llamar, si no se especifica, usa 'index' por defecto
        $method = empty($url[0]) ? 'index' : strtolower($url[0]);
        // Ruta al archivo del controlador basado en el nombre del controlador obtenido
        $file = "../App/Controllers/$controllerName.php";
      

        // Verifica si el archivo del controlador existe
        if (file_exists($file)) {

            // Incluye el archivo del controlador
            require_once($file);
            // Crea una instancia del controlador
            $controller = new $controllerName;
           
            // Verifica si el método existe en el controlador
            if (method_exists($controller, $method)) {
                // Llama al método del controlador con los parámetros restantes de la URL
                
                call_user_func_array([$controller, $method], $url);
            } else {
                // Si el método no existe en el controlador, devuelve un error 404
                http_response_code(404);
                echo "Method not allowed";
            }
        } else {
            // Si el controlador no existe, devuelve un error 404
            http_response_code(404);
            echo "Controller not found";
        }
    }

    // Método para redirigir al HomeController cuando la URL está vacía
    private function redirectToHome() {
        require_once "../App/Controllers/HomeController.php";
        $controller = new HomeController();
        $controller->index();
    }
}
