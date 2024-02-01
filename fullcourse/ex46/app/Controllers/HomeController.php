<?php

declare(strict_types=1);

namespace app\Controllers;

use \app\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index', ['foo' => 'bar']);
    }

    public function upload()
    {   
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';
    }

}
