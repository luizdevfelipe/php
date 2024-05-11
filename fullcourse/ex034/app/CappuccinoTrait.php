<?php 
    namespace app;

    trait CappuccinoTrait
    {
        use LatteTrait;
        
        private function makeCappuccino()
        {
            echo static::class . ' is making cappuccino <br>';
        }        
    }
?>