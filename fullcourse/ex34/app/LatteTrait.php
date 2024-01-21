<?php 
    namespace app;
    trait LatteTrait
    {
        protected string $milkType = 'whole-milk';
        public static string $foo = '';

        public function makeLatte()
        {
            echo static::class . ' is making latte with ' . $this->milkType  .'<br>' ;
        }

        public static function setFoo($x){
            static::$foo = $x;
        }

        //abstract public function getMilkType():string;

        public function setMilkType(string $type)
        {
            $this->milkType = $type;
        }
    }
?>