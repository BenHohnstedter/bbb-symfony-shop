<?php

namespace App\Repository;

use App\Model\Ordering;
use PDO;

class OrderingRepo extends DataBaseRepo
{
    protected string $table = 'ordering';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }

    //    findLastByUser
    public function findByLastUserOrdering($user): Ordering|false
    {
        $sql = 'SELECT *
                FROM ordering
                WHERE user = :user
                ORDER BY id desc 
                limit 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);

        $stmt->execute();
        $ordering = $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Ordering(...$props));

        if (empty($ordering[0])) {
            return false;
        }

        $ordering[0]->setRegistry(Registry::getInstance());

        return $ordering[0];
    }

    public function findByLastOrderedUserOrdering($user): Ordering|false
    {
        $sql = 'SELECT *
                FROM ordering
                WHERE user = :user AND is_ordered = 1
                ORDER BY id desc 
                limit 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);

        $stmt->execute();
        $ordering = $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Ordering(...$props));

        if (empty($ordering[0])) {
            return false;
        }

        $ordering[0]->setRegistry(Registry::getInstance());

        return $ordering[0];
    }

    public function createAction($user): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO ordering(user, created_at) 
                VALUES (:user, :createdAt)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);
        $stmt->bindParam('createdAt', $createdAt);
        $stmt->execute();
    }

    public function changeToOrdered($user): void
    {
        $sql = 'UPDATE ordering
                SET is_ordered = 1 
                WHERE user = :user && is_ordered != 1
                ORDER BY id desc 
                limit 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);
        $stmt->execute();
    }

    public function setPdf($id, $pdf): void
    {
        $sql = 'UPDATE ordering
                SET pdf = :pdf
                WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('pdf', $pdf);
        $stmt->execute();
    }

    public function getOrderedUserOrders($user): iterable
    {
        $sql = 'SELECT *
                FROM ordering
                WHERE user = :user && is_ordered = 1
                ORDER BY id DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);

        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Ordering(...$props)) as $basket) {
            $basket->setRegistry(Registry::getInstance());
            yield $basket;
        }
    }
}
