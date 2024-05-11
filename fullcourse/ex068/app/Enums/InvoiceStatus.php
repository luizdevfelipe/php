<?php 
declare(strict_types=1);
namespace App\Enums;

use App\Contracts\InvoiceServiceInterface;

enum InvoiceStatus: int implements InvoiceServiceInterface
{
    use InvoiceStatusHelper;

    case Pending = 0;
    case Void = 1;
    case Paid = 2;
    case Failed = 3;

    public function toString(): string
    {
        return match($this){
            self::Pending => 'Pending',
            self::Paid => 'Paid',
            self::Failed => 'Failed',
            self::Void => 'Void',
        };
    }

    public function color(): Color
    {
        return match($this){
            self::Pending => Color::Yellow,
            self::Paid => Color::Green,
            self::Failed => Color::Red,
            self::Void => Color::Orange
        };
    }
}