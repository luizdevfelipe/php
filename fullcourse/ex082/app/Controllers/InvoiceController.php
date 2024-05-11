<?php 
declare(strict_types=1);
namespace App\Controllers;

use App\Attributes\Get;
use App\Models\Invoice;
use App\Enums\InvoiceStatus;
use Carbon\Carbon;
use Twig\Environment;

class InvoiceController
{   
    public function __construct(private Environment $twig)
    {        
    }

    #[Get('/invoices')]
    public function index(): string
    {        
        $invoices = Invoice::query()->where('status', InvoiceStatus::Paid)->get()->toArray();        

        return $this->twig->render('invoices/index.twig', ['invoices' => $invoices]);      
    }

    #[Get('/invoices/new')]
    public function create()
    {
        $invoice = new Invoice();

        $invoice->amount = 55;
        $invoice->status = InvoiceStatus::Pending;
        $invoice->user_id = 2;
        $invoice->due_date = (new Carbon())->addDay();

        $invoice->save();

        echo $invoice->id . ', ' . $invoice->due_date->format('m/d/Y');
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }
}

?>