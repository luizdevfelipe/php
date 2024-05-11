<?php 
    namespace app;
    class CoffeMaker 
    {
        public function makeCoffee()
        {
            echo static::class . ' is making coffee <br>';
        }
    }
?>