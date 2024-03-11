<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\App;
use \App\Config;
use App\Container;
use App\Controllers\GeneratorsExemple;
use \App\Controllers\HomeController;
use \App\Controllers\InvoiceController;

use App\SalesTaxCalculator;
use \App\Invoice;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

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
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();
