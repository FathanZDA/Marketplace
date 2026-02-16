<?php

require_once '../app/controllers/AuthController.php';

$router->post('auth/register', 'AuthController@register');
