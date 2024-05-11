<?php 
    class Transaction {
        public function __construct(private float $amount, private ?string $description = null)
        {
            echo $amount;
        }

        public function getDescription(){
            return $this->description;
        }         
    }

?>