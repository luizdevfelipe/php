<?php 
    require_once '../vendor/autoload.php';

    $coffeMaker = new \app\CoffeMaker();
    $coffeMaker->makeCoffee();

    $latteMaker = new \app\LatteMaker();
    $latteMaker->makeLatte();

    $cappuccino = new \app\CappuccinoMaker();
    $cappuccino->makeCappuccino();

    $allInOneCoffeeMaker = new \app\AllInOneCoffeeMaker();
    $allInOneCoffeeMaker->makeCoffee();
    $allInOneCoffeeMaker->makeLatte();
    $allInOneCoffeeMaker->makeOriginalLatte();
    $allInOneCoffeeMaker->makeCappuccino();   

   \app\LatteMaker::$foo = 'foo';
   \app\AllInOneCoffeeMaker::$foo = 'bar';

   echo \app\LatteMaker::$foo .  ' ' . \app\AllInOneCoffeeMaker::$foo . '<br>';

?>