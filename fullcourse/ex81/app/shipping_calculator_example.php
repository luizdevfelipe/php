<?php

declare(strict_types=1);

use App\Services\BillableWeightCalculatorService;

require __DIR__ . '/../vendor/autoload.php';


$package = [
    'weight' => 6,
    'dimensions' => [
        'width' => 9,
        'length' => 15,
        'height' => 7
    ]
];

$fedexDimDivisor = 139;

$billableWight = (new BillableWeightCalculatorService())->calculate(
    $package['dimensions']['width'],
    $package['dimensions']['height'],
    $package['dimensions']['length'],
$package['weight'],
    $fedexDimDivisor
);

echo $billableWight . ' lb' . PHP_EOL;