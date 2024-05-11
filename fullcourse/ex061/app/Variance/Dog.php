<?php 
declare(strict_types=1);
namespace App\Variance;

use App\Variance\Animal;

class Dog extends Animal 
{
    public function speak()
    {
        echo $this->name . ' barks ';
    }
}