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

// $entityManager->beginTransaction();
// $entityManager->createNativeQuery();

$queryBuilder = $entityManager->createQueryBuilder();

$query = $queryBuilder
    ->select('i', 'it.description')
    ->from(Invoice::class, 'i')
    ->join('i.items', 'it')
    ->where(
        $queryBuilder->expr()->andX(
            $queryBuilder->expr()->gt('i.amount', ':amount'),
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('i.status', ':status'),
                $queryBuilder->expr()->gte('i.createdAt', ':date'),
            )
        )
    )
    ->setParameter('amount', 100)
    ->setParameter('status', InvoiceStatus::Paid)
    ->setParameter('date', '2022-03-25 00:00:00')
    ->getQuery();


$invoices = $query->getResult();


/** @var Invoice $inv */
foreach($invoices as $invoice){
    echo $invoice->getCreatedAt()->format('m/d/Y G:ia')
    . ', ' . $invoice->getAmount()
    . ', ' . $invoice->getStatus()->toString() . PHP_EOL;

    foreach($invoice->getItems() as $item){
        echo ' - ' . $item->getDescription()
        . ' - ' . $item->getQuantity()
        . ' - ' . $item->getUnitePrice() . PHP_EOL;
    }
}

