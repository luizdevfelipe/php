<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\View;
use App\Services\InvoiceService;
use App\Attributes\Get;
use App\Attributes\Post;
use Symfony\Component\Mime\Address;

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

    #[Get('/users/create')]
    public function create()
    {
        return View::make('users/register');
    }

    #[Post('/users')]
    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $firstName = explode(' ', $name)[0];

        $text = <<<Body
Hello $firstName,

Thank you for siging up!
Body;

$html = <<<Htmlbody
<h1 style="text-align: center; color: blue; ">Welcome</h1>
Hello $firstName,
<br>
Thank you for siging up!
Htmlbody;

        (new \App\Models\Email())->queue(
            new Address($email),
            new Address('support@exemple.com', 'Suport'),
            'Welcome',
            $html,
            $text
        );      
    }
}
