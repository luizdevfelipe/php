<?php 
    require_once '../vendor/autoload.php';

    $service = new app\DebtCollectionService();

    echo $service->collectDebt(new \app\Rocky());
?>