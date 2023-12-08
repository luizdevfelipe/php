<?php
    class Pessoa{
        private $nome, $idade, $sexo;

        public function __construct($no, $id, $se){
            $this->nome = $no;
            $this->idade = $id;
            $this->sexo = $se;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($n){
            $this->nome = $n;
        }

        public function getIdade(){
            return $this->idade;
        }

        public function setIdade($i){
            $this->idade = $i;
        }

        public function getSexo(){
            return $this->sexo;
        }

        public function setSexo($s){
            $this->sexo = $s;
        }

        public function fazerAniver(){
            $this->setIdade($this->getIdade() + 1);
            echo "Parabéns";
        }

    }


?>