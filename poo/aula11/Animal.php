<?php
    abstract class Animal{
        protected $peso;
        protected $idade;
        protected $membros;

        abstract function locomover();
        abstract function alimentar();
        abstract function emitirSom();

        public function getPeso(){
            return $this->peso;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function getMembros(){
            return $this->membros;
        }

        public function setPeso($p){
            $this->peso = $p;
        }

        public function setIdade($i){
            $this->idade = $i;
        }

        public function setMembros($m){
            $this->membros = $m;
        }
    }
?>