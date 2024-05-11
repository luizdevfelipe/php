<?php 
declare(strict_types=1);
namespace App\Variance;

use App\Variance\Dog;
use App\Variance\AnimalShelter;

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog
    {
        return new Dog($name);
    }
}