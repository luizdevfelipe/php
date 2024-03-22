<?php

namespace App;

use App\Entity\Invoice;
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

// $query = $entityManager->createQuery('SELECT i.amount FROM App\Entity\Invoice i WHERE i.id = :id');
// $query->getResult();

$queryBuilder = $entityManager->createQueryBuilder();

//WHERE amount > :amount AND (status = :status OR created_at >= :date)
//WHERE i.amount > :amount AND (i.status = :status OR i.createdAt >= :date)

//WHERE (i.amount > :amount AND i.status = :status) OR i.createdAt >= :date

$query = $queryBuilder
    ->select('i')
    ->from(Invoice::class, 'i')
    ->where(
        $queryBuilder->expr()->andX(
            $queryBuilder->expr()->gt('i.amount', ':amount'),
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('i.status', ':status'),
                $queryBuilder->expr()->gte('i.createdAt', ':date'),
            )
        )
    )
    // ->andWhere('i.status = :status')
    // ->orWhere('i.createdAt >= :date')
    ->setParameter('amount', 100)
    ->setParameter('status', InvoiceStatus::Paid)
    ->setParameter('date', '2022-03-25 00:00:00')
    ->getQuery();

echo $query->getDQL();

exit;

$invoice = $query->getArrayResult();
var_dump($invoice);

// /** @var Invoice $inv */
// foreach($invoice as $inv){
//     echo $inv->getAmount()
//     . ', ' . $inv->getStatus()->toString() . PHP_EOL;
// }

