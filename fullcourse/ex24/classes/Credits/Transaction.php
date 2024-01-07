<?php 
    declare(strict_types=1);

    namespace Credits;

    use Debits\Transaction as DebitTransaction;

    class Transaction{
        public function __construct()
        {
            //var_dump(\explode(',', 'Hello,World'));
        }        
    }

    function explode(string $separator, string $str):string{
        return 'test';
    }
?>