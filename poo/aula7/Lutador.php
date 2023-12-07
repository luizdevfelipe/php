<?php
class Lutador
{
    private $nome;
    private $nacionalidade;
    private $idade, $sexo;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    public function __construct($no, $na, $id, $se, $al, $pe, $vi, $de, $em){
        $this->nome = $no;
        $this->nacionalidade = $na;
        $this->idade = $id;
        $this->sexo = $se;
        $this->altura = $al;
        $this->setPeso($pe);
        $this->vitorias = $vi;
        $this->derrotas = $de;
        $this->empates = $em;
    }

    public function getNome()
    {
        return $this->nome;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
   
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
   
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function setSexo($s){
        $this->sexo = $s;
    }

    public function getSexo(){
        return $this->sexo;
    }
   
    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
    }
    
    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
        $this->setCategoria();
    }
   
    public function getCategoria()
    {
        return $this->categoria;
    }

    private function setCategoria()
    {
        if ($this->getPeso() < 52.2){
            $this->categoria = 'Inválido';
        } else if ($this->getPeso() <= 70.3) {
            $this->categoria = "Leve";
        } else if ($this->getPeso() <= 83.9){
            $this->categoria = "Médio";
        } else if ($this->getPeso() <= 120.2){
            $this->categoria = "Pesado";
        } else {
            $this->categoria = "Inválido";
        }
    }
    
    public function getVitorias()
    {
        return $this->vitorias;
    }

    public function setVitorias($vitorias)
    {
        $this->vitorias = $vitorias;
    }
   
    public function getDerrotas()
    {
        return $this->derrotas;
    }

    public function setDerrotas($derrotas)
    {
        $this->derrotas = $derrotas;
    }

    public function getEmpates()
    {
        return $this->empates;
    }

    public function setEmpates($empates)
    {
        $this->empates = $empates;
    }

    public function apresentar(){
        if ($this->getSexo() == 1){
            $pessoa = "O LUTADOR";
        } else { $pessoa = "A LUTADORA"; }
        echo "<p>--------------------------</p>";
        echo "<p> CHEGOU A HORA! $pessoa " . $this->getNome() . "</p>";
        echo "Veio diretamente de " . $this->getNacionalidade();
        echo " tem " . $this->getIdade() . ' anos, pesa ' . $this->getPeso() . "Kg";
        echo " com " . $this->getAltura() . "m de altura";        
        echo "<br>Ganhou: " . $this->getVitorias() ." lutas";
        echo " perdeu: " . $this->getDerrotas();
        echo " e tem " . $this->getEmpates() . " empates";
    }

    public function status(){
        echo"<p>--------------------------</p>";
        echo "<p>" . $this->getNome() . " é peso " . $this->getCategoria();
        echo " e já ganhou ". $this->getVitorias() . " vezes ";
        echo "perdeu " . $this->getDerrotas() . " vezes e empatou " . $this->getEmpates() . " vezes";
    }

    public function ganharLuta(){
        $this->setVitorias($this->getVitorias() + 1);
    }

    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas() + 1);
    }

    public function empatarLuta(){
        $this->setEmpates($this->getEmpates() + 1);
    }
}
