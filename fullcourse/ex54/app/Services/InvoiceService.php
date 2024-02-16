<?php 
declare (strict_types=1);
namespace App\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayService $getewayService,
        protected EmailService $emailService
    )
    {
        
    }

    public function process(array $customer, float $amount):bool
    {
        
        //1. Calculate sales tax
        $tax = $this->salesTaxService->calculate($amount, $customer);

        //2. process invoice
        if(! $this->getewayService->charge($customer, $amount, $tax)){
            return false;
        }

        //3. send receipt
        $this->emailService->send($customer, 'receipt');

        echo 'Invoice has been processed <br>';

        return true;
    }
}
