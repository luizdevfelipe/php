<?php 
declare(strict_types=1);
namespace App\Controllers;

use App\View;
use App\Attributes\Get;
use App\Models\Invoice;
use App\Enums\InvoiceStatus;
use Carbon\Carbon;
use Symfony\Component\Mailer\MailerInterface;

class InvoiceController
{   
    public function __construct(MailerInterface $mailer)
    {        
    }

    #[Get('/invoices')]
    public function index(): View
    {        
        $invoices = Invoice::query()->where('status', InvoiceStatus::Paid)->get()->toArray();        
        return View::make('invoices/index', ['invoices' => $invoices]);      
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