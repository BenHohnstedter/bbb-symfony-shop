<?php

namespace App\Repository;

use App\Model\Orderingitem;
use PDO;

class OrderingItemRepo extends DataBaseRepo
{
    protected string $table = 'orderingitem';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }

    public function findByProductId($ordering, $product): bool|Orderingitem
    {
        $sql = 'SELECT *
                FROM orderingitem
                WHERE product = :product AND ordering = :ordering
                GROUP BY product';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('ordering', $ordering);
        $stmt->bindParam('product', $product);

        $stmt->execute();
        $orderingItem = $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Orderingitem(...$props));

        if (empty($orderingItem[0])) {
            return false;
        }

        $orderingItem[0]->setRegistry(Registry::getInstance());

        return $orderingItem[0];
    }

    public function findAllFromUser($ordering): iterable
    {
        $sql = 'SELECT *
                FROM orderingitem
                WHERE ordering = :ordering
                GROUP BY product
                ORDER BY last_update DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('ordering', $ordering);

        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Orderingitem(...$props)) as $orderingItem) {
            $orderingItem->setRegistry(Registry::getInstance());
            yield $orderingItem;
        }
    }

    public function addToOrderingItem($ordering, $product, $amount): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO orderingitem(ordering, product, amount, created_at) 
                VALUES (:ordering, :product, :amount, :createdAt)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('ordering', $ordering);
        $stmt->bindParam('product', $product);
        $stmt->bindParam('amount', $amount);
        $stmt->bindParam('createdAt', $createdAt);
        $stmt->execute();
    }

    public function deleteOutOrderingItem($ordering, $product): void
    {
        $sql = 'DELETE FROM orderingitem WHERE ordering = :ordering AND product = :product';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('ordering', $ordering);
        $stmt->bindParam('product', $product);
        $stmt->execute();
    }
}
