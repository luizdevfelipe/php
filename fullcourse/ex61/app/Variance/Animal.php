<?php 
declare(strict_types=1);
namespace App\Variance;

abstract class Animal 
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function speak();
}