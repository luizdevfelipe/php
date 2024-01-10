<?php
// require_once "classes/Credits/Transaction.php";
// require_once "classes/Debits/Transaction.php";
// require_once "classes/Credits/CustomerProfile.php";

// use Credits\Transaction;
// use Debits\Transaction as DebitTransaction;

spl_autoload_register(function ($class) {
    $path = __DIR__ . '\\classes\\' . lcfirst(str_replace('/', '/', $class)) . '.php';

    require $path;
});

use credits\Transaction;

$credit = new Transaction();

var_dump($credit);
