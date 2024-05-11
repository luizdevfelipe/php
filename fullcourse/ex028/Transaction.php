<?php 
    namespace class;

    class Transaction {
        private float $amount;

        public function __construct(float $amount)
        {
            $this->amount = $amount;
        }

        public function process(){
            echo 'Processing $' . $this->amount . ' transaction';
        }

        public function getAmount(){
            return $this->amount;
        }

        public function setAmount($a){
            $this->amount = $a;

            $this->generateReceipt(); 
        }

        private function generateReceipt(){
            return true;
        }
    }


?>