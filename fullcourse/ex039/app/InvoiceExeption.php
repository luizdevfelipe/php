<?php 
namespace app;

class InvoiceExeption extends \Exception
{
    public static function missingBillingInfo():static
    {
        return new static('Missing billing info');
    }

    public static function InvalidAmount():static
    {
        return new static('Invalid invoice amount');
    }
}
?>