<?php 
declare(strict_types=1);

namespace App\Models;

use App\Model;

class Payments extends Model
{
    public function all(): \Generator
    {
        $stmt = $this->db->query(
            'SELECT * FROM payment'
        );

        return $this->fetchLazy($stmt);
    }
}