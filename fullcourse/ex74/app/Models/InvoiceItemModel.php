<?php 
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $unit_price
 * @property int $quantity
 * @property string $description
 * @property int $invoice_id
 */
class InvoiceItemModel extends Model
{
    protected $table = 'invoice_items';
    public $timestamps = false;

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(InvoiceItemModel::class);
    }
}