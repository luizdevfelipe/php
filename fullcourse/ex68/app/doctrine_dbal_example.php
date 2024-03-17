<?php
namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

//$ids = [1, 2, 3];
//$result = $conn->fetchAllAssociative('SELECT id FROM invoices WHERE id IN (?)', [$ids], [\Doctrine\DBAL\ArrayParameterType::INTEGER]);
//$conn->beginTransaction();
//$conn->commit();
//$conn->transactional(function(){});

/*
$builder = $conn->createQueryBuilder();

$result = $builder->select('id', 'amount')
    ->from('invoices')
    ->where('amount > ?')
    ->setParameter(0, 6000)
    ->fetchAllAssociative(); 
*/

$schema = $conn->createSchemaManager();

//$result = $schema->listTableNames();
$result = array_keys($schema->listTableColumns('invoices'));

var_dump($result);

