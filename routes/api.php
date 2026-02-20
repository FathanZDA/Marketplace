<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/ProductController.php';

$router->post('auth/register', 'AuthController@register');
$router->post('auth/login', 'AuthController@login');

$router->get('profile', 'ProfileController@index', ['auth']);
$router->get('auth/logout', 'AuthController@logout');

$router->get('products', 'ProductController@index', ['auth']);
$router->post('products', 'ProductController@store', ['auth']);