<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;

use App\Models\InvoiceItem;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../eloquent.php';

$invoiceId = 3;
Invoice::query()
    ->where('id', '=', $invoiceId)
    ->update(['status' => InvoiceStatus::Paid]);

$invoices = Manager::table('invoices')->where('status', InvoiceStatus::Paid)->get();

var_dump($invoices);
exit;

Invoice::query()
    ->where('status', InvoiceStatus::Paid)
    ->get()->each(function (Invoice $invoice) {
        echo $invoice->id . ' - ' . $invoice->status->toString() . ' - ' . $invoice->created_at->format('m/d/Y') . PHP_EOL;

        $invoice->items()->where('description', 'Item 1')->update(['description' => 'foo bar']);

        $item = $invoice->items->first();
        $item->description = 'Item 1';
        
        $invoice->push();
    });

// Manager::connection()->transaction(function () {
//     $invoice = new Invoice();

//     $invoice->amount = 45;
//     $invoice->user_id = 1;
//     $invoice->status = InvoiceStatus::Pending;
//     $invoice->due_date = (new Carbon())->addDays(10);

//     $invoice->save();

//     $items = [['Item 1', 4, 4.73], ['Item 2', 1, 20.99], ['Item 3', 2, 5.99]];

//     foreach ($items as [$description, $quantity, $unitPrice]) {
//         $item = (new InvoiceItem());

//         $item->description = $description;
//         $item->quantity = $quantity;
//         $item->unit_price = $unitPrice;

//         $item->invoice()->associate($invoice);

//         $item->save();
//     }
// });
