<?php 
declare(strict_types=1);
namespace App;

use App\PaymentStatus;

class Payment

{
    private PaymentStatus $status;

    public function setStatus(PaymentStatus $status){
        $this->status = $status;
    }

    public function viewStatus(): PaymentStatus
    {
        return $this->status;
    }
}
