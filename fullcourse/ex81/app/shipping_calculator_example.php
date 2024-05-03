<?php

declare(strict_types=1);

use App\Services\BillableWeightCalculatorService;
use App\Services\Shipping\DimDivisor;
use App\Services\Shipping\PackageDimensions;
use App\Services\Shipping\Weight;

require __DIR__ . '/../vendor/autoload.php';


$package = [
    'weight' => 6,
    'dimensions' => [
        'width' => 9,
        'length' => 15,
        'height' => 7
    ]
];

$weight = new Weight($package['weight']);

$billableWeightService = new BillableWeightCalculatorService();
$packageDimensions = new PackageDimensions(
    $package['dimensions']['width'],
    $package['dimensions']['height'],
    $package['dimensions']['length']
);

$widerPackageDimensions = $packageDimensions->increaseWidth(10);

$billableWight = $billableWeightService->calculate(
    $packageDimensions,
    $weight,
    DimDivisor::FEDEX
);

$widerBillableWeight = $billableWeightService->calculate(
    $widerPackageDimensions,
    $weight,
    DimDivisor::FEDEX
);

echo $billableWight . ' lb' . PHP_EOL;
echo $widerBillableWeight . ' lb' . PHP_EOL;
