<?php

namespace App\Repository;

use PDO;

abstract class DataBaseRepo extends AbstractRepo
{
    public function __construct(
        protected PDO $pdo
    ) {
    }

    public function findAll(): iterable
    {
        $sql = "SELECT *
                FROM $this->table
                ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);

        $object = "\App\Model\\".ucfirst($this->table);

        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new $object(...$props)) as $modelObject) {
            $modelObject->setRegistry(Registry::getInstance());
            yield $modelObject;
        }
    }

    public function findById($id): ?object
    {
        $sql = "SELECT *
                FROM $this->table
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);

        $object = "\App\Model\\".ucfirst($this->table);

        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new $object(...$props));

        if (empty($object[0])) {
            return null;
        }

        $object[0]->setRegistry(Registry::getInstance());

        return $object[0];
    }

    public function findByParam($param, $id): iterable
    {
        $sql = "SELECT *
                FROM $this->table
                WHERE $param = :id
                ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);

        $object = "\App\Model\\".ucfirst($this->table);

        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new $object(...$props)) as $modelObject) {
            $modelObject->setRegistry(Registry::getInstance());
            yield $modelObject;
        }
    }

    public function deleteItem($param, $id): void
    {
        $sql = "DELETE FROM $this->table 
                WHERE $param = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
}
