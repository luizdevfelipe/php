<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\App;
use App\Container;
use App\Controllers\GeneratorsExemple;
use \App\Controllers\HomeController;
use \App\Controllers\InvoiceController;

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEWS_PATH', __DIR__ . '/../views');

$container = new Container();
$router = new \App\Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        GeneratorsExemple::class,
        InvoiceController::class
    ]
);

(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']]
))->boot()->run();
