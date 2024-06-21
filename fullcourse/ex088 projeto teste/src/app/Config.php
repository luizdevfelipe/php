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
                'host' => $env['DB_HOST'],
                'username' => $env['DB_USER'],
                'password' => $env['DB_PASS'],
                'database' => $env['DB_DATABASE'],
                'driver' => $env['DB_DRIVER'] ?? 'pdo_mysql',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ],
            'environment' => $env['APP_ENVIRONMENT'] ?? 'production',            
        ];
    }

    public function __get($name)
    {
        return $this->config[$name] ?? null;
    }
}
