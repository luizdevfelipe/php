<?php 
    require_once "Pessoa.php";
    class Aluno extends Pessoa{
        private $matricula;
        private $curso;

        public function pagarMensalidade(){
            echo "<p>Pagando a mensalidade do aluno ". $this->getNome() ."</p>";
        }
        
        public function getMatricula(){
            return $this->matricula;
        }

        public function getCurso(){
            return $this->curso;
        }
        
        public function setMatricula($m){
            $this->matricula = $m;
        }

        
        public function setCurso($c){
            $this->curso = $c;
        }

    }
?>