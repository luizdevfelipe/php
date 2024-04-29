<?php 
declare (strict_types=1);
namespace App\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayInterface $getewayService,
        protected EmailService $emailService
    )
    {
        
    }

    public function process(array $customer, float $amount)
    {

    }
}
