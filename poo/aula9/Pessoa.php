<?php
class Pessoa
{
    private $nome;
    private $idade;
    private $sexo;

    public function setNome($n)
    {
        $this->nome  = $n;
    }

    public function setIdade($n)
    {
        $this->idade  = $n;
    }

    public function setSexo($n)
    {
        $this->sexo  = $n;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function fazerAniv(){
        $this->setIdade($this->getIdade() + 1);
    }
}
