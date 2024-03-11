<?php 
declare(strict_types=1);

namespace App;

class SalesTaxCalculator
{
    public function __construct(protected SalesTaxServiceInterface $api)
    {
        
    }

    public function calculator(float|int $total): float
    {
        return $this->api->calculate($total);
    }
}