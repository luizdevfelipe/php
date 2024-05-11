<?php 
declare(strict_types=1);
namespace App\Variance;

use App\Variance\Cat;
use App\Variance\AnimalShelter;

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat
    {
        return new Cat($name);
    }
}