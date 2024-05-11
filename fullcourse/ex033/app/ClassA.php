<?php 
    namespace app;

    class ClassA{
        protected string $name = 'A';
        protected static $nome = 'A';

        public function getName():string {
            return $this->name;
        }

        public static function getStaticName():string {
            return static::$nome;
        }

        public static function make(): static {
            return new static();
        }
    }
?>