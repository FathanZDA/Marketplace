<?php

require_once '../app/controllers/AuthController.php';

$router->post('auth/register', 'AuthController@register');
$router->post('auth/login', 'AuthController@login');

$router->get('profile', 'ProfileController@index');

$router->get('auth/logout', 'AuthController@logout');

