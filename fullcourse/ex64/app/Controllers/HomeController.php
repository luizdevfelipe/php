<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\View;
use App\Services\InvoiceService;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;

class HomeController
{
    public function __construct(private InvoiceService $invoice)
    {        
    }

    #[Get('/')]
    #[Get(routePath: '/home')]
    public function index(): View
    {
        $this->invoice->process([], 25);

        return View::make('index');
    }

    #[Post('/')]
    public function store()
    {

    }

    #[Put('/')]
    public function update()
    {

    }

}
