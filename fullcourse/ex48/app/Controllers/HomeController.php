<?php

declare(strict_types=1);

namespace app\Controllers;

use \app\View;
use PDO;

class HomeController
{
    public function index(): View
    { 
        try {
            $db = new PDO('mysql:host=db;dbname=my_db', 'root', 'root', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_EMULATE_PREPARES => false]);

            $email = 'john@doe.com';           

            $query = 'SELECT * FROM users WHERE email = ?';          
            $stmt = $db->prepare($query);
            $stmt->execute([$email]);        
            foreach($stmt->fetchAll() as $user){
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
            }

            $email = 'foo@bar.com';
            $name = 'Fulano';

            $query = 'INSERT INTO users (full_name, email, created_at) VALUES (:name, :email, NOW())';
            $result = $db->prepare($query);

            $result->bindValue('name', $name);
            $result->bindParam('email', $email);            
            $email = 'bar@foo.co';

            //$result->execute();

            $id = (int) $db->lastInsertId();

            $user = $db->query('SELECT * FROM users WHERE id = ' . $id)->fetch();

            echo '<pre>';
            var_dump($user);
            echo '</pre>';

        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage());
        }
        var_dump($db);
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
