<?php 
declare(strict_types=1);
namespace App\Enums;

trait InvoiceStatusHelper
{
    public function fromColor(Color $color): InvoiceStatus
    {
        return match($color){
            Color::Green => self::Paid,
            Color::Red => self::Failed,
            Color::Orange => self::Void,
            default => self::Pending
        };
    }
}