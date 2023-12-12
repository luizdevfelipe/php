<?php 
    require_once "Animal.php";
    class Mamifero extends Animal{
        private $corPelo;
        
        public function alimentar(){
            echo "<p>Mamando</p>";
        }

        public function emitirSom()
        {
            echo "<p> Som de mamífero </p>";
        }

        public function locomover()
        {
            echo "<p> Correndo </p>";
        }

        public function setCorPelo($c){
            $this->corPelo = $c;
        }

        public function getCorPelo(){
            return $this->corPelo;
        }
    }

?>