<?php 
    spl_autoload_register(function($class){
        $path = __DIR__ . '\\' . $class . '.php' ;
        require_once $path;
    });

    use app\Transaction;
    use app\Enums\Status;

    $transaction = new Transaction();

    echo '<br>' . $transaction::class . '<br>';

    $transaction->setStatus(Status::PAID);
    var_dump($transaction);
?>