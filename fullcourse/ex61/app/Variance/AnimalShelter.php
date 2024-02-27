<?php 
declare(strict_types=1);
namespace App\Variance;

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}