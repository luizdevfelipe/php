<?php 
    require_once "Animal.php";
    class Peixe extends Animal{
        private $corEscama;

        public function alimentar()
        {
            echo "<p> Comendo substâncias </p>";
        }

        public function locomover()
        {
            echo "<p> Nadando </p>";
        }

        public function emitirSom()
        {
            echo "<p> Peixe não faz som </p>";
        }

        public function soltarBolha(){
            echo "<p> Soltando bolhas </p>";
        }

        public function setEscama($s){
            $this->corEscama = $s;
        }

        public function getEscama(){
            return $this->corEscama;
        }
    }
?>