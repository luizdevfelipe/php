<?php 
declare(strict_types=1);

namespace App\Enums;

enum Color: string
{
    case Green = 'green';
    case Red = 'red';
    case Yellow = 'yellow';
    case Orange = 'orange';

    public function getClass()
    {
        return 'color-' . $this->value;
    }
}