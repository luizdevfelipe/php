<?php 
    namespace app;

    class ClassFoo{
        public function __construct(public int $x, public int $y)
        {            
        }

        public function foo():string{
            return '<br>foo<br>';
        }

        public function bar():object{
            return new class($this->x, $this->y) extends ClassFoo {
                public function __construct(public int $x, public int $y)
                {
                    parent::__construct($x, $y);
                    echo $this->foo();
                }
            };
        }
    }
?>