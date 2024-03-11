<?php

declare(strict_types=1);

namespace App;

class Invoice 
    {
    public function __construct(private SalesTaxCalculator $salesTaxCalculator)
    {
        // Invoice has a SalesTaxCalculator
    }
    public function create(array $lineItems)
    {
        //Calculate sub total
        $lineItemsTotal = $this->calculateLineItemsTotal($lineItems);

        //Calculate sales tax
        $salesTax = $this->salesTaxCalculator->calculator($lineItemsTotal);

        $total = $lineItemsTotal + $salesTax;

        echo 'Sub Total: $' . $lineItemsTotal . PHP_EOL .
             'Sales Tax: $' . $salesTax . PHP_EOL .
             'Total: $' . $total . PHP_EOL;

        // ... Do some other stuff ...
    }

    public function calculateLineItemsTotal(array $items): float|int
    {
        return array_sum(
            array_map(
                fn($item) => $item['unitPrice'] * $item['quantity'], $items
            )
            );
    }
}
