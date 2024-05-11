<?php 
    namespace app;

    class Invoice 
    {
        public string $id;        

        public function __construct(public float $amount,
        public string $description,
        public string $creditCardNumber)
        {   
            $this->id = uniqid('invoice_');
        }

        public function __clone():void
        {
            $this->id = uniqid('invoice_');            
        }

        public function __sleep():array
        {
            return ['id', 'amount'];
        }

        public function __wakeup():void
        {
            
        }

        public function __serialize(): array
        {
            return [
                'id' => $this->id,
                'creditCardNumber' => base64_encode($this->creditCardNumber),
                'foo' => 'bar'
            ];
        }

        public function __unserialize(array $data):void
        {
            $this->id = $data['id'];
            $this->creditCardNumber = base64_decode($data['creditCardNumber']);
        }
    }
?>