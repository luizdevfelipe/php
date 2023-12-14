<?php 
    abstract class Pessoa{
        protected $nome;
        protected $idade;
        protected $sexo;
        protected $experiencia;

        public function __construct($nome, $idade, $sexo)
        {   
            $this->nome = $nome;
            $this->idade = $idade;
            $this->sexo = $sexo;
            $this->experiencia = 0;
        }

        protected function ganharExp($n){
            $this->experiencia = $n;
        }

        public function setNome($t){
            $this->nome = $t;
        }

        public function setIdade($a){
            $this->idade = $a;
        }

        public function setSexo($v){
            $this->sexo = $v;
        }

        public function setExp($c){
            $this->experiencia = $c;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function getExp(){
            return $this->experiencia;
        }
    }
?>