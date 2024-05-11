<?php

declare(strict_types=1);

namespace app;

class Transaction
{
    private static int $count = 0;

    public function __construct(public float $amount, public string $description)
    {
        self::$count++;
    }

    public static function getCount(): int
    {
        return self::$count;
    }
}

class DB
{
    public static ?DB $instance = null;

    private function __construct(public array $config)
    {
        echo '<br>instance Created <br>';
    }

    public static function getInstance(array $config): DB
    {
        if (self::$instance === null) {
            self::$instance = new DB($config);
        }
        return self::$instance;
    }
}
