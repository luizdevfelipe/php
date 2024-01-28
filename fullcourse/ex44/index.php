<?php
$folder = 'ex44';
require_once '../vendor/autoload.php';
session_start();

$router = new \app\Router();
$router
    ->get('/php/fullcourse/ex44/', [\app\Classes\Home::class, 'index'])
    ->get('/invoices', [\app\Classes\Invoice::class, 'index'])
    ->get('/invoices/create', [\app\Classes\Invoice::class, 'create'])
    ->post('/invoices/create', [\app\Classes\Invoice::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

var_dump($_COOKIE);