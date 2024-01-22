<?php 
    use App\Invoice;
    $folder = 'ex38';
    require_once '../vendor/autoload.php';

    $invoice = new Invoice(25, 'Invoice 1', '1231245522');

    echo serialize(true) . '<br>';
    echo serialize(1) . '<br>';
    echo serialize(2.5) . '<br>';
    echo serialize('hello world') . '<br>';
    echo serialize([1, 2, 3]) . '<br>';
    echo serialize(['a' => 1, 'b' => 2]) . '<br>';

    $serialized = serialize($invoice);
    echo $serialized . '<br><br>';

    $unserialized = unserialize($serialized);
    var_dump($unserialized);


?>