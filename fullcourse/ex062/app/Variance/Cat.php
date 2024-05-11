<?php 
declare(strict_types=1);
namespace App\Variance;

use App\Variance\Animal;

class Cat extends Animal 
{
    public function speak()
    {
        echo $this->name . ' meows ';
    }

    public function eat(Food $food)
    {
        echo $this->name . ' eats ' . get_class($food);
    }
}