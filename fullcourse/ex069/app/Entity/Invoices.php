<?php 
declare(strict_types=1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table('invoices')]
class Invoice
{
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    #[Column(type: Types::DECIMAL, precision: 10, scale: 4)]
    private float $amount;

    #[Column(name: 'user_id')]
    private int $userId;

    private InvoiceStatus $status;

    public function getId(): int {
        return $this->id;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function getStatus(): InvoiceStatus {
        return $this->status;
    }

    public function setAmount(float $amount): void {
        $this->amount = $amount;
    }

    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function setStatus(InvoiceStatus $status): void {
        $this->status = $status;
    }
}