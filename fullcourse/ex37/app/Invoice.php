<?php 
    namespace app;

    class Invoice 
    {
        private string $id;

        public function __construct()
        {   
            $this->id = uniqid('invoice_');
            var_dump('__contruct');
        }

        public function __clone():void
        {
            $this->id = uniqid('invoice_');
            var_dump('__clone');
        }
    }
?>