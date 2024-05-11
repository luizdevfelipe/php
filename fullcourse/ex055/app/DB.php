<?php 
declare(strict_types=1);
namespace App;
use \PDO;
class DB
{
    private PDO $pdo;
    public function __construct(array $config)
    {
        $defaulOptions = [
            PDO::ATTR_EMULATE_PREPARES =>false,
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC
        ];
        try {
            $this->pdo = new PDO(
                $config['driver'].':host=' .$config['host']. ';dbname=' .$config['db'], 
                $config['user'], 
                $config['pass'], 
                $config['options'] ?? $defaulOptions
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }
}