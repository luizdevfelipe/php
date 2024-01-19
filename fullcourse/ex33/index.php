<?php 
    require_once '../vendor/autoload.php';

    // $classA = new \app\ClassA();
    // $classB = new \app\ClassB();

    // echo $classA->getName(). '<br>';
    // echo $classB->getname()

    echo \app\ClassA::getStaticName();
    echo \app\ClassB::getStaticName();
    var_dump(\app\ClassB::make());
?>