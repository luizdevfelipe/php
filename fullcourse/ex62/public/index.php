<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Variance\AnimalFood;
use App\Variance\CatShelter;
use App\Variance\DogShelter;

$kitty = (new CatShelter)->adopt('Ricky');
$kitty->speak();
echo PHP_EOL;

$catfood = new AnimalFood();
$kitty->eat($catfood);
echo PHP_EOL;

$doggy = (new DogShelter)->adopt('Mavrick');
$doggy->speak();
echo PHP_EOL;

$dogfood = new AnimalFood();
$doggy->eat($dogfood);
echo PHP_EOL;