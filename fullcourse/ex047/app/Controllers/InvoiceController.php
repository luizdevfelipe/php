<?php 
declare(strict_types=1);
namespace app\Controllers;

use app\View;

class InvoiceController
{
    public function index(): View
    {                
        return \app\View::make('invoices/index');      
    }

    public function create(): View
    {
        return \app\View::make('invoices/create');
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}

?>