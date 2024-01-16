<?php 
    namespace app;
    abstract class Field{
        public function __construct(protected string $name)
        {
            
        }

        public abstract function render(): string;
    }

?>