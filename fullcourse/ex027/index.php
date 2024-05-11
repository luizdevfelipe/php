<?php 
    require_once "app/Transaction.php";
    use app\Transaction;
    use app\DB;

    //$transaction = new Transaction(12, 'Debit');

    echo Transaction::getCount();
    DB::getInstance([]);
?>