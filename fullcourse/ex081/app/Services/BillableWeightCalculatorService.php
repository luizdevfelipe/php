<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Shipping\DimDivisor;
use App\Services\Shipping\PackageDimensions;
use App\Services\Shipping\Weight;

class BillableWeightCalculatorService
{
    public function calculate(
        PackageDimensions $packageDimensions,
        Weight $weight,
        DimDivisor $dimDivisor
    ): int {      

        $dimWeight = (int) round($packageDimensions->width * $packageDimensions->height * $packageDimensions->length / $dimDivisor->value);

        return max($weight->value, $dimWeight);
    }
}
