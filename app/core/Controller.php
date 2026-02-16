<?php

class Controller
{
    protected function json($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }


}
