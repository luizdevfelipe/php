<?php 
    require_once "Pessoa.php";
    class Gafanhoto extends Pessoa{
        private $login;
        private $totAssistido;

        public function __construct($nome, $idade, $sexo, $login){
            parent::__construct($nome, $idade, $sexo);
            $this->login = $login;
            $this->totAssistido = 0;
        }

        public function assistirMaisUm(){
            $this->totAssistido += 1;
        }

        public function getLogin(){
            return $this->login;
        }

        public function getTotAssitido(){
            return $this->totAssistido;
        }

        public function setLogin($l){
            $this->login = $l;
        }

        public function setTotAssistido($T){
            $this->totAssistido = $T;
        }
    }
?>