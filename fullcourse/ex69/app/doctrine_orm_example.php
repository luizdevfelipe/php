<?php
namespace App;

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$params = [
    'driver' => $env['DB_DRIVER'] ?? 'pdo_mysql',
    'host' => $env['DB_HOST'],
    'user' => $env['DB_USER'],
    'password' => $env['DB_PASS'],
    'dbname' => $env['DB_DATABASE']
];

$entityManager = EntityManager::create(
    $params, 
    Setup::createAttributeMetadataConfiguration([__DIR__ . '/Entity'])
);

$items = [['Item 1', 1, 15], ['Item 2', 2, 7.75], ['Item 3', 4, 4,75]];

$invoice = (new Invoice())
    ->setAmount(45)
    ->setStatus(InvoiceStatus::Pending);

foreach($items as [$description, $quatity, $unitPrice]){
    $item = (new InvoiceItem())
        ->setDescription($description)
        ->setQuantity($quatity)
        ->setUnitPrice($unitPrice);

    $invoice->addItem($item);
}

