<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Shipping\PackageDimensions;

class BillableWeightCalculatorService
{
    public function calculate(
        PackageDimensions $packageDimensions,
        int $weight,
        int $dimDivisor
    ): int {      

        $dimWeight = (int) round($width * $height * $length / $dimDivisor);
        return max($weight, $dimWeight);
    }
}
