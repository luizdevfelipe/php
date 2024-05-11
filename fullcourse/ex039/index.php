<?php

use app\Customer;
use app\Invoice;

$folder = 'ex39';
require_once '../vendor/autoload.php';

// set_exception_handler(function(\Throwable $e){
//     var_dump($e->getMessage());
// });

// $invoice = (new Invoice(new Customer()))->process(5);

var_dump(process());

function process(){
    $invoice = new Invoice(new Customer([1, 2]));
    try{
        $invoice->process(-5);
        return true;
    } catch (\Exception $e){
        echo $e->getMessage();
        return false;
    } finally {
        echo '<br>Finally block<br>';
        return 1;
    }
}



