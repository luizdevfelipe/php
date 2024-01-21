<?php 
    namespace app;

    class CappuccinoMaker extends CoffeMaker
    {
        use CappuccinoTrait;
        
        public function makeCappuccino()
        {
            echo 'Making Cappuccino (UPDATED) <br>';
        }
        
    }
?>