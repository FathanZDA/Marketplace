<?php

require_once '../app/core/Controller.php';
require_once '../app/middleware/AuthMiddleware.php';

class ProfileController extends Controller
{
    public function index()
    {
        $this->view('profile/index');
    }
}

