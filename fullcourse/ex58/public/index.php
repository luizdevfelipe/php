<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \App\Invoice;

$invoice1 = new Invoice();
$map = new WeakMap();

$map[$invoice1] = ['a' => 1, 'b' => 2];

var_dump(count($map));
unset($invoice1);

var_dump($map);
var_dump(count($map));
