<?php
require_once "Pessoa.php";
class Aluno extends Pessoa
{
    private $matr, $curso;

    public function getMatr()
    {
        return $this->matr;
    }
    public function getCurso()
    {
        return $this->curso;
    }

    public function setMatr($n)
    {
        $this->matr  = $n;
    }

    public function setCurso($n)
    {
        $this->curso  = $n;
    }

    public function cancelarMatr()
    {
        echo "<p> A matrícula será cancelada </p>";
    }
}
