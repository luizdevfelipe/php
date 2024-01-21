<?php 
    namespace app;
    class AllInOneCoffeeMaker extends CoffeMaker
    {
        use CappuccinoTrait{
            CappuccinoTrait::makeLatte insteadof LatteTrait;
            CappuccinoTrait::makeCappuccino as public;
        }
        use LatteTrait{
            LatteTrait::makeLatte as makeOriginalLatte;
        }       
    }
?>