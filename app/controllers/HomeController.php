<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';

class HomeController extends Controller
{
    public function index()
{
    echo "HOME CONTROLLER JALAN";
    $this->view('home/index');
}

}
