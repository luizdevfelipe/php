<?php
require_once "AcoesVideo.php";
class Video implements AcoesVideo
{
    private $titulo;
    private $avaliacao;
    private $views;
    private $curtidas;
    private $reproduzindo;

    public function __construct($t)
    {
        $this->setTitulo($t);
        $this->setAvaliacao(1);
        $this->setCurtidas(0);
        $this->setViews(0);
        $this->setReproduzindo(false);
    }

    public function play()
    {
        $this->setReproduzindo(true);
    }

    public function pause()
    {
        $this->setReproduzindo(false);
    }

    public function like()
    {
        $this->curtidas ++;
    }

    public function setTitulo($t)
    {
        $this->titulo = $t;
    }

    public function setAvaliacao($a)
    {   
        if ($this->views == 0){
            $visualizacoes = 1;
        } else {
            $visualizacoes = $this->getViews();
        }
        $media = ($this->avaliacao + $a) / $visualizacoes;
        $this->avaliacao = $media;
    }

    public function setViews($v)
    {
        $this->views = $v;
    }

    public function setCurtidas($c)
    {
        $this->curtidas = $c;
    }

    public function setReproduzindo($r)
    {
        $this->reproduzindo = $r;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAvalizacao()
    {
        return $this->avaliacao;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function getCurtidas()
    {
        return $this->curtidas;
    }

    public function getReproduzindo()
    {
        return $this->reproduzindo;
    }
}
