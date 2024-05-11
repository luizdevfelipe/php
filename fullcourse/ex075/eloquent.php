<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$capsule = new Capsule;

$params = [
    'driver' => $_ENV['DB_DRIVER'] ?? 'mysql',
    'host' => $_ENV['DB_HOST'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'database' => $_ENV['DB_DATABASE'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
];

$capsule->addConnection($params);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();
