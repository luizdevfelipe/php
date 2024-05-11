<?php

declare(strict_types=1);

namespace App;

class Config
{
    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
                'host' => $env['DB_HOST'],
                'user' => $env['DB_USER'],
                'pass' => $env['DB_PASS'],
                'db' => $env['DB_DATABASE']
            ],
            'mailer' => [
                'dsn' => $env['MAILER_DSN'] ?? ''
            ]
        ];
    }

    public function __get($name)
    {
        return $this->config[$name] ?? null;
    }
}
