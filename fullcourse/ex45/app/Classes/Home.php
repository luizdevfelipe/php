<?php

declare(strict_types=1);

namespace app\Classes;

class Home
{
    public function index(): string
    {
       
        return <<<FORM
            <form action='/upload' method="post" enctype="multipart/form-data">
                <input type="file" name="receipt">
                <input type="file" name="myimage">
                <button type="submit">Upload</button>
        FORM;
    }

    public function upload()
    {   
        echo '<pre>';
        var_dump($_FILES);

        // var_dump(pathinfo($_FILES['receipt']['tmp_name']));
        // echo '</pre>';

        // $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        // move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        // echo '<pre>';
        // var_dump(pathinfo($filePath));
        // echo '</pre>';
    }
}
