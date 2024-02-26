<?php

use App\PaymentStatus;
use App\Payment;

require_once __DIR__ . '/../vendor/autoload.php';

$payment = new Payment();

$payment->setStatus(PaymentStatus::PAID);

echo $payment->viewStatus()->name . PHP_EOL;
echo $payment->viewStatus()->value . PHP_EOL;