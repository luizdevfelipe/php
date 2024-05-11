<?php 
require_once 'Transaction.php';
$transaction = new Transaction(100, 'Transaction 1');
$transaction->addTax(8);
$transaction->applyDiscount(8);

echo $transaction->getAmount(). '<br>';
var_dump($transaction);

echo '<br>';

$amount = (new Transaction(100, 'Transaction 2'))
    ->addTax(8)
    ->applyDiscount(8)
    ->getAmount();

echo $amount;

?>