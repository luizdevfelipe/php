<?php 
declare(strict_types=1);
namespace  App;

class Invoice
{
    public function __destruct()
    {
        echo 'Destructed' . PHP_EOL;
    }
}
