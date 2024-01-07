<?php
    require_once "classes/Credits/Transaction.php";
    require_once "classes/Debits/Transaction.php";
    require_once "classes/Credits/CustomerProfile.php";

    use Credits\Transaction;
    use Debits\Transaction as DebitTransaction;

    $credit = new Transaction();
    $debit = new DebitTransaction();
    
    var_dump($credit, $debit);
?>