<?php

declare(strict_types=1);

namespace app\Classes;

class Home
{
    public function index(): string
    {
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        
        setcookie(
            'userName',
            'Gio',
            time() + (60 * 60 * 24)
        );
        return 'Home';
    }
}
