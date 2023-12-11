<?php 
    require_once "Pessoa.php";
    class Professor extends Pessoa{
        private $especialidade;
        private $salario;

        public function receberAumento($a){
            $this->salario += $a;
        }

        public function setSalario($a){
            $this->salario = $a;
        }

        public function setEspecialidade($s){
            $this->especialidade = $s;
        }

        public function getSalario(){
            return $this->salario;
        }

        public function getEspecialidade(){
            return $this->especialidade;
        }
    }
?>