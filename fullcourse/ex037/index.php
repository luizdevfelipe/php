<?php 
    $folder = 'ex37';
    require_once '../vendor/autoload.php';

    $invoice = new \app\Invoice();

    $invoice2 = clone $invoice;

    var_dump($invoice, $invoice2, $invoice === $invoice2);
?>