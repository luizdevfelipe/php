<?php

declare(strict_types=1);

namespace App\Models;

class Transactions extends \App\Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTransaction()
    {
        $stmt = $this->db->prepare(
            'SELECT date, check_code, description, amount FROM transactions'
        );

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function formatValues()
    {
        $rows = $this->getTransaction();

        $totIncome = $totExpense = 0;
        foreach($rows as $row){
            if ($row['amount'] >= 0){
                $totIncome += $row['amount'];
            } else {
                $totExpense += $row['amount'];
            }            
        }
    }
}
