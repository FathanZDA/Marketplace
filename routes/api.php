<?php

require_once '../app/controllers/AuthController.php';

$router->post('auth/register', 'AuthController@register');
$router->post('auth/login', 'AuthController@login');

