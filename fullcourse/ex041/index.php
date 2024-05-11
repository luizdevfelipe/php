<?php 
    $folder = 'ex41';
    require_once "../vendor/autoload.php";
    use \app\Invoice, \app\InvoiceCollection;    
    
    $invoiceCollection = new InvoiceCollection([new Invoice(15), new Invoice(25), new Invoice(50)]);

    foreach($invoiceCollection as $invoice) {
        echo $invoice->id . ' - ' . $invoice->amount . '<br>';
    }
?>