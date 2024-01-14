<?php 
    require_once 'Transaction.php';
    use class\Transaction;
        
    $transaction = new Transaction(25);

    $transaction->setAmount(10);

    $transaction->process();

    
?>