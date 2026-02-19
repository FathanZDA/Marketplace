<?php

class Router
{
    private $routes = [];

        public function get($url, $action, $middleware = [])
    {
        $this->routes['GET'][$url] = [
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public function post($url, $action, $middleware = [])
    {
        $this->routes['POST'][$url] = [
            'action' => $action,
            'middleware' => $middleware
        ];
        }


        public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_GET['url'] ?? '/';

        $route = $this->routes[$method][$url] ?? null;

        if (!$route) {
            echo "Route tidak ditemukan";
            return;
        }

        if (!empty($route['middleware'])) {
            foreach ($route['middleware'] as $mw) {
                $className = ucfirst($mw) . 'Middleware';

                require_once "../app/middleware/$className.php";

                $middleware = new $className();
                $middleware->handle();
            }
        }


        list($controller, $action) = explode('@', $route['action']);

        require_once "../app/controllers/$controller.php";

        $controller = new $controller();
        $controller->$action();
    }

}
