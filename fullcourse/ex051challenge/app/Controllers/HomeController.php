<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\CsvFileModel;
use App\Models\Transactions;
use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('upload');
    }

    public function upload()
    {       
        (new CsvFileModel())->saveData();
        header('Location: /transactions');
    }

    public function transactions(){
        $rows = (new Transactions())->getTransaction();
        return View::make('transactions', [$rows]);
    }
}
