<?php 
declare(strict_types=1);
namespace App\Services;

class PaymentGatewayService
{
    public function charge(array $customer, float $amount, float $tax)
    {
        //sleep(1);

        return (bool) 1;
    }
}