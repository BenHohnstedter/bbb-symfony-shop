<?php

namespace App\Repository;

use PDO;

class CategoryRepo extends DataBaseRepo
{
    protected string $table = 'category';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }
}
