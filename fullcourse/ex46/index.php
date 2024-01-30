<?php
$folder = 'ex46';
require_once '../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '\\storage');
define('VIEWS_PATH', __DIR__ . '\\views');

$router = new \app\Router();
$router
    ->get('/php/fullcourse/ex46/', [\app\Controllers\HomeController::class, 'index'])
    ->post('/upload', [\app\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [\app\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [\app\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [\app\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);