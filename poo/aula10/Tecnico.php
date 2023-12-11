<?php 
    require_once "Aluno.php";
    final class Tecnico extends Aluno{
        private $registroProfissional;

        public function praticar(){
            echo "<p>O técnico está praticando...</p>";
        }

        public function getRegistro(){
            return $this->registroProfissional;
        }

        public function setRegistro($r){
            $this->registroProfissional = $r;
        }

    }
?>