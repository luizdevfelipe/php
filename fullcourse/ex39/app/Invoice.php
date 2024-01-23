<?php 
namespace app;

class Invoice
{
    public function __construct(public Customer $customer)
    {

    }
    public function process(float $amount):void
    {
        if ($amount <= 0){
            throw InvoiceExeption::InvalidAmount();
        }

        if (empty($this->customer->getBillingInfo())){
            throw InvoiceExeption::missingBillingInfo();
        }
        echo 'Processing $' . $amount . ' invoice - ';

        sleep(1);

        echo 'OK <br>';
    }
}

?>
