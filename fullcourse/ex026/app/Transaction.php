<?php
declare(strict_types=1);
namespace app;

use app\Enums\Status;

class Transaction
{
    private string $status = Status::PENDING;

    public function __construct()
    {
        //var_dump(self::STATUS_PAID);
        $this->setStatus(Status::PENDING);
    }

    public function setStatus($status): self{
        if (empty(Status::ALL_STATUSES[$status])){
            throw new \InvalidArgumentException('Esdado inválido');
        }
        $this->status = $status;
        return $this;
    }
}
