<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../app/core/Router.php';

$router = new Router();

require_once '../routes/api.php';

$router->run();

