<?php 
    class Transaction {
        private float $amount;
        private string $desciption;

        public function __construct(float $amount, string $descri)
        {
            $this->amount = $amount;
            $this->desciption = $descri;
        }

        public function addTax(float $rate): Transaction{
            $this->amount += $this->amount * $rate / 100;

            return $this;
        }

        public function applyDiscount(float $rate): Transaction{
            $this->amount -= $this->amount * $rate / 100;

            return $this;
        }

        public function getAmount(){
            return $this->amount;
        }

        public function __destruct()
        {
            echo '<br>' . ' Destruct ' . $this->desciption . '<br>';
        }
    }
?>