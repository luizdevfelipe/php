<?php
$folder = 'ex43';
require_once '../vendor/autoload.php';

$router = new \app\Router();
$router
    ->get('/php/fullcourse/ex43/', [\app\Classes\Home::class, 'index'])
    ->get('/invoices', [\app\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [\app\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [\app\Classes\Invoice::class, 'store']);
    
echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);