<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;

use App\Models\InvoiceItemModel;
use App\Models\InvoiceModel;
use Carbon\Carbon;

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../eloquent.php';

$invoice = new InvoiceModel();

$invoice->amount = 45;
$invoice->user_id = 1;
$invoice->status = InvoiceStatus::Pending;
$invoice->due_date = (new Carbon())->addDays(10);

$invoice->save();

$items = [['Item 1', 4, 4.73], ['Item 2', 1, 20.99], ['Item 3', 2, 5.99]];

foreach ($items as [$description, $quantity, $unitPrice]) {
    $item = (new InvoiceItemModel());

    $item->description = $description;
    $item->quantity = $quantity;
    $item->unit_price = $unitPrice;

    $item->invoice()->associate($invoice);

    $item->save();
}
