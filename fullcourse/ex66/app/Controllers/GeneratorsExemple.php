<?php 
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Payments;
use App\Attributes\Route;

class GeneratorsExemple
{
    public function __construct(private Payments $paymentModel)
    {        
    }

    #[Route('/generator/exemple')]
    public function index()
    {
        $numbers = $this->lazyRange(1, 300000);      
        foreach($numbers as $key => $number){
            echo $key . ': ' . $number . '<br>';
        }      
    }

    private function lazyRange(int $start, int $end): \Generator
    {
        for($i = $start; $i <= $end; $i++){
            yield $i;
        }        
    }

    public function payments()
    {
        foreach($this->paymentModel->all() as $payment){
            print_r($payment );
            echo '<br>';
        }

    }
}