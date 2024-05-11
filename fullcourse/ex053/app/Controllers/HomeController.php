<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\View;
use \App\App;
use \App\Models\User;
use \App\Models\Invoice;
use \App\Models\SignUp;

class HomeController
{
    public function index(): View
    {
        $db = App::db();

        $email = 'pa@de.com';
        $name = 'Poa Doe';
        $amount = 47654;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email'=>$email,
                'name'=>$name
            ],  
            [
                'amount'=>$amount
            ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function download()
    {
        header('Content-type: image/jpg');
        header('Content-Disposition: attachment;filename="myfile.jpg"');

        readfile(STORAGE_PATH . '/manual.jpg');
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit;
    }
}
