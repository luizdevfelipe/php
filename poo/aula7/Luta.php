<?php 
require_once "Lutador.php";

class Luta{
    private $desafiante;
    private $desafiado;
    private $rounds, $aprovada;

    public function setDesafiante($dd){
        $this->desafiante = $dd;
    }

    public function getDesafiante(){
        return $this->desafiante;
    }

    public function setDesafiado($dd){
        $this->desafiado = $dd;
    }

    public function getDesafiado(){
        return $this->desafiado;
    }

    public function setRounds($n){
        $this->rounds = $n;
    }

    public function getRounds(){
        return $this->rounds;
    }

    public function setAprovada($v){
        $this->aprovada = $v;
    }

    public function getAprovada(){
        return $this->aprovada;
    }

    public function marcarLuta($l1, $l2){
        if ($l1->getCategoria() === $l2->getCategoria() && $l1 != $l2 && $l1->getSexo() === $l2->getSexo()){
            $this->setAprovada(true);
            $this->setDesafiado($l1);
            $this->setDesafiante($l2);
        } else {
            $this->setAprovada(false);
            $this->setDesafiado(null);
            $this->setDesafiante(null);
        }
    }

    public function lutar(){
        if ($this->getAprovada()){
            $this->getDesafiado()->apresentar();
            $this->getDesafiante()->apresentar();
            $vencedor = rand(0, 2);

            switch ($vencedor){
                case 0: //Empate
                    echo "<p>EMPATE!</p>";
                    $this->getDesafiado()->empatarLuta();
                    $this->getDesafiante()->empatarLuta();
                    break;

                case 1: //Desafiado Vence
                    echo "<p>".$this->getDesafiado()->getNome()." venceu!</p>";
                    $this->getDesafiado()->ganharLuta();
                    $this->getDesafiante()->perderLuta();
                    break;

                case 2: //Desafiante Vence
                    echo "<p>".$this->getDesafiante()->getNome()." venceu!</p>";
                    $this->getDesafiante()->ganharLuta();
                    $this->getDesafiado()->perderLuta();
                    break;
            }


        } else {
            echo"<p>Luta não pode acontecer!</p>";
        }
    }



}
?>