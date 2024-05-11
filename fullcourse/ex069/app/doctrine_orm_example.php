<?php

namespace App;

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$params = [
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
    'host' => $_ENV['DB_HOST'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'dbname' => $_ENV['DB_DATABASE']
];

$entityManager = new EntityManager(
    DriverManager::getConnection($params),
    ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/Entity'])
);

// $items = [['Item 1', 1, 15], ['Item 2', 2, 7.75], ['Item 3', 4, 4, 75]];

// $invoice = (new Invoice())
//     ->setAmount(45)
//     ->setStatus(InvoiceStatus::Pending);

// foreach ($items as [$description, $quatity, $unitPrice]) {
//     $item = (new InvoiceItem())
//         ->setDescription($description)
//         ->setQuantity($quatity)
//         ->setUnitPrice($unitPrice);

//     $invoice->addItem($item);
// }

// $entityManager->persist($invoice);

$invoice = $entityManager->find(Invoice::class, 11);
$invoice->getItems()->get(0)->setDescription('Foo Bar');

$entityManager->flush();