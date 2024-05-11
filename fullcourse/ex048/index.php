<?php
$folder = 'public';
require_once '../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEWS_PATH', __DIR__ . '/../views');

try{

$router = new \app\Router();
$router
    ->get('/', [\app\Controllers\HomeController::class, 'index'])
    ->get('/download', [\app\Controllers\HomeController::class, 'download'])
    ->post('/upload', [\app\Controllers\HomeController::class, 'upload'])
    ->get('/invoices', [\app\Controllers\InvoiceController::class, 'index'])
    ->get('/invoices/create', [\app\Controllers\InvoiceController::class, 'create'])
    ->post('/invoices/create', [\app\Controllers\InvoiceController::class, 'store']);

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

} catch (\app\Exceptions\RouteNotFoundException $e) {
    //header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo \app\View::make('error/404');
}