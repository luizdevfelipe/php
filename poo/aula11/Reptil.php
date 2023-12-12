<?php 
    require_once "Animal.php";
    class Reptil extends Animal{
        private $corEscama;

        public function alimentar()
        {
            echo "<p> Comendo vegetais </p>";
        }

        public function locomover()
        {
            echo "<p> Rastejando </p>";
        }

        public function emitirSom()
        {
            echo "<p> Som de réptil </p>";
        }

        public function setEscama($s){
            $this->corEscama = $s;
        }

        public function getEscama(){
            return $this->corEscama;
        }

    }
?>