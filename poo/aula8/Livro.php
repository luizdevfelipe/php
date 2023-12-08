<?php
require_once "Pessoa.php";
require_once "Publicacao.php";
class Livro implements Publicacao
{
    private $titulo, $autor, $totPaginas, $pagAtual, $aberto, $leitor;

    public function __construct($ti, $au, $tot, $le)
    {
        $this->setTitulo($ti);
        $this->setAutor($au);
        $this->setTotPags($tot);
        $this->setLeitor($le);
        $this->setAberto(false);
        $this->setPagAtual(0);
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getTotPags()
    {
        return $this->totPaginas;
    }

    public function getPagAtual()
    {
        return $this->pagAtual;
    }

    public function getAberto()
    {
        return $this->aberto;
    }

    public function getLeitor()
    {
        return $this->leitor;
    }

    public function setTitulo($t)
    {
        $this->titulo = $t;
    }

    public function setAutor($a)
    {
        $this->autor = $a;
    }

    public function setTotPags($t)
    {
        $this->totPaginas = $t;
    }

    public function setPagAtual($p)
    {
        $this->pagAtual = $p;
    }

    public function setAberto($a)
    {
        $this->aberto = $a;
    }

    public function setLeitor($l)
    {
        $this->leitor = $l;
    }

    public function detalhes()
    {
        echo "<br> <hr>Livro " . $this->getTitulo() . " escrito por " . $this->getAutor();
        echo "<br> Páginas: " . $this->getTotPags() . " Atual : " . $this->getPagAtual() . "<br> Sendo lido por " . $this->getLeitor()->getNome();
    }

    public function abrir()
    {
        if (!$this->getAberto()) {
            $this->setAberto(true);
        }
    }

    public function fechar()
    {
        if ($this->getAberto()) {
            $this->setAberto(false);
        }
    }

    public function folhear($p)
    {
        if ($p > $this->getTotPags()) {
            $this->setPagAtual(0);
        } else {
            $this->setPagAtual($p);
        }
    }

    public function avancarPag()
    {
        if ($this->getPagAtual() < $this->getTotPags()) {
            $this->setPagAtual($this->getPagAtual() + 1);
        } else {
            $this->setPagAtual($this->getTotPags());
        }
    }

    public function voltarPag()
    {
        if ($this->getPagAtual() > 0) {
            $this->setPagAtual($this->getPagAtual() - 1);
        }
    }
}
