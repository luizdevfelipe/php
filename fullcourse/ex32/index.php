<?php 
    require_once '../vendor/autoload.php';

    $invoice = new \app\Invoice();
    $invoice->amount = 10;

    var_dump(isset($invoice->amount));
    unset($invoice->amount);
    var_dump($invoice);

    $invoice->process(1, 'Description');
    \app\Invoice::processing();

    echo $invoice;

    $invoice();

    var_dump($invoice);
?>