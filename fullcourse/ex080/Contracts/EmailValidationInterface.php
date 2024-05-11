<?php
declare(strict_types=1);
namespace App\Contracts;

use app\DTO\EmailValidationResult;

interface EmailValidationInterface
{
    public function verify(string $email): EmailValidationResult;
}