<?php
    require_once "Gafanhoto.php";
    require_once "Video.php";

    class Visualizacao {
        private $espectador;
        private $filme;

        public function __construct($es, $fi)
        {
            $this->espectador = $es;
            $this->filme = $fi;
            $this->filme->setViews($this->filme->getViews() + 1);
            $this->espectador->setTotAssistido($this->espectador->getTotAssitido() + 1);
        }

        public function avaliar(){
            $this->filme->setAvaliacao(5);
        }

        public function avaliarNota($nota){
            $this->filme->setAvaliacao($nota);
        }

        public function avaliarPorcent($porc){
            $nova = 0;
            if ($porc <= 20){
                $nova = 3;
            } else if ($porc <= 50){
                $nova = 5;
            } else if ($porc <= 90){
                $nova = 8;
            } else {
                $nova = 10;
            }
            $this->filme->setAvaliacao($nova);
        }

        public function getFilme(){
            return  $this->filme;
        }

        public function getEspectador(){
            return $this->espectador;
        }

        public function setFilme($f){
            $this->filme = $f;
        }

        public function setEspectador($e){
            $this->espectador = $e;
        }
    }

?>