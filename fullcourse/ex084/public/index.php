<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Controllers\HomeController;
use \App\Controllers\InvoiceController;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Extra\Intl\IntlExtension;

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEWS_PATH', __DIR__ . '/../views');

$app = AppFactory::create();

$app->get('/', HomeController::class, 'index');

$twig = Twig::create(VIEWS_PATH, [
    'cache' => STORAGE_PATH . '/cache',
    'auto_reload' => true
]);

$twig->addExtension(new IntlExtension());

$app->add(TwigMiddleware::create($app, $twig));

$app->run();