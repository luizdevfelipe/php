<?php 
declare(strict_types=1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Database\Eloquent\Model;

#[Entity()]
#[Table('invoice_items')]
class InvoiceItem extends Model
{
    #[Id]
    #[Column(), GeneratedValue()]
    private int $id;

    #[Column(name: 'invoice_id')]
    private int $invoiceId;
    
    #[Column()]
    private string $description;
    
    #[Column()]
    private int $quantity;

    #[Column(name: 'unity_price', type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $unityPrice;

    #[ManyToOne(inversedBy: 'items')]
    private Invoice $invoice;

    public function setDescription($desc): InvoiceItem
    {
        $this->description = $desc;
        return $this;
    }

    public function setQuantity($quantity): InvoiceItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setUnitPrice($price): InvoiceItem
    {
        $this->unityPrice = $price;
        return $this;
    }

    public function setInvoice($invoice): InvoiceItem
    {
        $this->invoice = $invoice;
        return $this;
    }
}
