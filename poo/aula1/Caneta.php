<?php 
    class Caneta{
        public $modelo;
        public $cor;
        public $ponta;
        public $carga;
        public $tampada;
        
        function rabiscar(){
            if ($this->tampada){
                echo"<p> Não posso rabiscar!</p>";
            } else {
                echo"<p> Estou rabiscando! </p>";
            }
            
        }

        function tampar(){
            $this->tampada = true;
        }

        function destampar(){
            $this->tampada = false;
        }
    }
    
?>