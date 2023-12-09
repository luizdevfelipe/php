<?php
require_once "Pessoa.php";
class Professor extends Pessoa
{
    private $especialidade, $salario;

    public function setSal($s)
    {
        $this->salario = $s;
    }
    public function setEspec($e)
    {
        $this->especialidade  = $e;
    }

    public function getSal()
    {
        return $this->salario;
    }

    public function getEspec()
    {
        return $this->especialidade;
    }

    public function receberAum($a)
    {
        $this->setSal($this->getSal() + $a);
    }
}
