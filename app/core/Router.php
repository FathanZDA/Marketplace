<?php

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
    $url = $_GET['url'] ?? '/';

    if (isset($this->routes[$method][$url])) {

        $callback = $this->routes[$method][$url];

        if (is_string($callback)) {

            list($controller, $action) = explode('@', $callback);

            require_once "../app/controllers/$controller.php";

            $controller = new $controller();
            $controller->$action();

        } else {
            call_user_func($callback);
        }

    } else {
        echo "Route tidak ditemukan";
    }
    }
}
