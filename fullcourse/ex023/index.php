<?php 
    require_once 'Transaction.php';
    $transaction = new Transaction(5);

    $transaction->getDescription()?->amount;
?>