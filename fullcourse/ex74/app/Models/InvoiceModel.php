<?php 
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property InvoiceStatus $status
 * @property Carbon $created_at
 * @property Carbon $due_date
 */
class InvoiceModel extends Model
{
    protected $table = 'invoices';
    const UPDATED_AT = null;

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItemModel::class);
    }
}