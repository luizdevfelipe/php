<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Variance\CatShelter;
use App\Variance\DogShelter;

$kitty = (new CatShelter)->adopt('Ricky');
$kitty->speak();
echo PHP_EOL;

$doggy = (new DogShelter)->adopt('Mavrick');
$doggy->speak();
echo PHP_EOL;