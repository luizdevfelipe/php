<?php 
declare(strict_types=1);
namespace App\Controllers;

use App\View;
use App\Attributes\Get;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;

class InvoiceController
{
    #[Get('/invoices')]
    public function index(): View
    {        
        $invoices = (new Invoice())->all(InvoiceStatus::Void);        
        return View::make('invoices/index', ['invoices' => $invoices]);      
    }

    public function create(): View
    {
        return View::make('invoices/create');
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}

?>