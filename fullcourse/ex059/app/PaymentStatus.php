<?php 
declare(strict_types=1);
namespace App;

enum PaymentStatus: int

{
    case PAID = 1;
    case DECLINED = 2;
    case VOID = 3;
}
