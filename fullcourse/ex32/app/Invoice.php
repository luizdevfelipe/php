<?php 
    namespace app;
    class Invoice implements \Stringable
    {
        protected array $data = [];
        private int $id = 1;
        private string $accontNumber = '386732478952';

        public function __get(string $name)
        {
            if(array_key_exists($name, $this->data)){
                return $this->data[$name];
            }
            return null;
        }
        public function __set(string $name, $value)
        {
            $this->data[$name] = $value;
        }
        public function __isset($name)
        {
            var_dump('isset');
            return array_key_exists($name, $this->data);
        }
        public function __unset($name)
        {
            var_dump('unset');
            unset($this->data[$name]);
        }
        protected function process(float $amount, $description){
            var_dump($amount, $description);
        }

        public function __call(string $name, array $arguments)
        {
            if(method_exists($this, $name)){
                call_user_func_array([$this, $name], $arguments);
            }
        }
        public static function __callStatic($name, $arguments)
        {
            var_dump($name, $arguments);
        }
        public function __toString()
        {
            return 'Hello';
        }
        public function __invoke()
        {
            var_dump('invoked');
        }
        public function __debugInfo(): ?array
        {
            return [
                'id' => $this->id,
                'accontNumber' => '****' . substr($this->accontNumber, -4, 4)
            ];
        }
    }
?>