<?php
$folder = 'ex42';
require_once '../vendor/autoload.php';

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';


$router = new \app\Router();
$router
    ->register('/php/fullcourse/ex42/', [\app\Classes\Home::class, 'index'])
    ->register('/php/fullcourse/ex42/invoices', [\app\Classes\Invoice::class, 'index'])
    ->register('/php/fullcourse/ex42/invoices/create', [\app\Classes\Invoice::class, 'create']);
    
echo $router->resolve($_SERVER['REQUEST_URI']);
