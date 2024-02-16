<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\View;
use App\Services\InvoiceService;

class HomeController
{
    public function __construct(private InvoiceService $invoice)
    {        
    }

    public function index(): View
    {
        $this->invoice->process([], 25);

        return View::make('index');
    }

}
