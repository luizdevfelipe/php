<?php 
declare(strict_types=1);

namespace App\Models;

use App\Enums\InvoiceStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property InvoiceStatus $status
 * @property Carbon $created_at
 * @property Carbon $due_date
 * @property-read Collection $items
 */
class Invoice extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        'created_at' => 'datetime',
        'due_date' => 'datetime',
        'status' => InvoiceStatus::class,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}