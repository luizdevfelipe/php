<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\App;
use App\Container;

$container = new Container();

(new App($container))->boot();

$container->get(\App\Services\EmailService::class)->sendQueuedEmails();