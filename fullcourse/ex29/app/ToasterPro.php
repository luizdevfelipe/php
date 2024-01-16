<?php 
    namespace app;

    class ToasterPro extends Toaster{
        public function __construct()
        {
            parent::__construct();
            $this->size = 4;
        }

        public function toastBagel(){
            foreach($this->slices as $i => $slice){
                echo ($i + 1) . ': Toasting ' . $slice . ' with bagels option ' .  PHP_EOL;
            }
        }
    }
?>