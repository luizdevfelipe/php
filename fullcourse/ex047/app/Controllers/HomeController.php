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

    public function download()
    {//application/pdf
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
