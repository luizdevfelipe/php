<?php
// constructor tem saldo 0 e conta fechada

// privado numConta
// protegido tipo cc ou cp
// privado dono
// privado saldo
// privado status  true false

// privado abrirConta()  cc ganha 50   cp ganha 150
// privado fecharConta() somente se não tiver dinhero e nem débito
// privado depositar()  tem que estar aberta
// privado sacar()  tem que estar aberta e o saldo tem que ser maior que o saque
// privado pagarMensal()  cc paga 12  e cp paga 20 

// getnumConta()
// setnumConta()
// getTipo()
// setTipo()
// getDono()
// setDono()
// verSaldo()
// setSaldo()

class ContaBanco
{
    public $numConta;
    protected $tipoConta;
    private $dono;
    private $saldo;
    private $status;

    function __construct()
    {
        $this->saldo = 0;
        $this->status = false;
        echo "<p>Conta criada</p>";
    }

    public function getNumConta()
    {
        return $this->numConta;
    }

    public function setNumConta($v)
    {
        $this->numConta = $v;
    }

    public function getTipo()
    {
        return $this->tipoConta;
    }

    public function setTipo($t)
    {
        $this->tipoConta = $t;
    }

    public function getDono()
    {
        return $this->dono;
    }

    public function setDono($d)
    {
        $this->dono = $d;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($s)
    {
        $this->saldo = $s;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($s)
    {
        $this->status = $s;
    }

    public function abrirConta($t)
    {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($this->getTipo() == 'cc') {
            $this->setSaldo(50);
        } else if ($this->getTipo() == 'cp') {
            $this->setSaldo(150);
        }
    }

    public function depositar($d)
    {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $d);
            echo"<p>Depósido de R$$d na conta de(a) ". $this->getDono() ."</p>";
        } else {
            echo "<p>Impossível depositar</p>";
        }
    }

    public function sacar($s)
    {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $s) {
                $this->setSaldo($this->getSaldo() - $s);
                echo "<p>Saque de R$$s autorizado na conta de(a) ". $this->getDono() ."</p>";
            } else {
                echo "<p>Saldo insuficiente</p>";
            }
        } else {
            echo "<p>Impossível sacar!</p>";
        }
    }

    public function fecharConta()
    {
        if ($this->saldo == 0) {
            $this->setStatus(false);
            echo"A conta de(a) ". $this->getDono() ." foi encerrada";
        } else if ($this->saldo > 0) {
            echo "<p>Saque seu dinheiro para fazer essa operação</p>";
        } else if ($this->saldo < 0) {
            echo "<p>Pague suas dívidas para fazer essa operação</p>";
        }
    }

    public function pagarMensal()
    {
        $v = 0;
        if ($this->getTipo() == 'cc') {
            $v = 12;
        } else if ($this->getTipo() == 'cp') {
            $v = 20;
        }

        if ($this->getStatus()) {
            if ($this->getSaldo() > $v) {
                $this->saldo -= $v;
                echo "<p>A mesalidade de R$$v foi paga na conta de ". $this->getDono() . "</p>";
            } else {
                echo "<p>Saldo insificiente</p>";
            }
        } else {
            echo "<p>Impossível pagar</p>";
        }
    }
}