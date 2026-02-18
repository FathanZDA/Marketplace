<?php

require_once '../app/core/Controller.php';
require_once '../app/middleware/AuthMiddleware.php';

class ProfileController extends Controller
{
    public function index()
    {
        AuthMiddleware::check();

        $this->json($_SESSION['user']);
    }
}
