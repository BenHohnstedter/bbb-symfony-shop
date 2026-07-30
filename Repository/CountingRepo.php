<?php

namespace App\Repository;

use PDO;

class CountingRepo
{
    public function __construct(
        protected PDO $pdo
    ) {
    }

    public function countFilterAmount($table, $rowName, $filter): array
    {
        $sql = "SELECT *,
                $table.id AS id,
                $table.$rowName AS name,
                COUNT(product.id) AS filteredAmount
                FROM product
                LEFT JOIN category ON product.category = category.id
                LEFT JOIN user ON product.user = user.id
                ".$filter." 
                GROUP BY $table.$rowName
                ORDER BY amount DESC";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Model\Counting');
    }
}
