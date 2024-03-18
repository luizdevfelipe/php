<?php 
declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity()]
#[Table('invoice_items')]
class InvoiceItem
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

    #[Column(name: 'unit_price', type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $unityPrice;
}
