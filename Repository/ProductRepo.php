<?php

namespace App\Repository;

use App\Model\Product;
use PDO;

class ProductRepo extends DataBaseRepo
{
    protected string $table = 'product';

    public function __construct(
        protected PDO $pdo,
    ) {
        parent::__construct($pdo);
    }

    public function findByFilter($filter, $orderBy): array
    {
        $sql = 'SELECT *
                FROM product
                LEFT JOIN user ON product.user = user.id '.
                $filter.
                $orderBy;
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Product(...$props));
    }

    public function findByTopStars($limit): array
    {
        $sql = 'SELECT *
                FROM product
                ORDER BY star_average DESC
                LIMIT '.$limit;
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_FUNC, static fn (...$props) => new Product(...$props));
    }

    public function createProduct($input, $imageName, $userId): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO product(name, user, image_path, category, price, amount, description, created_at) 
                VALUES (:name, :user, :imagePath, :category, :price, :amount, :description, :createdAt)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('name', $input['name']);
        $stmt->bindParam('user', $userId);
        $stmt->bindParam('imagePath', $imageName);
        $stmt->bindParam('category', $input['category']);
        $stmt->bindParam('price', $input['price']);
        $stmt->bindParam('amount', $input['amount']);
        $stmt->bindParam('description', $input['description']);
        $stmt->bindParam('createdAt', $createdAt);
        $stmt->execute();
    }

    public function editProduct($input, $imageName): void
    {
        $input = [
            'id' => $input->getId(),
            'name' => $input->getName(),
            'imageName' => $imageName,
            'category' => $input->getCategory(),
            'price' => $input->getPrice(),
            'amount' => $input->getAmount(),
            'description' => $input->getDescription(),
        ];

        $sql = 'UPDATE product 
                SET
                name = :name,
                image_path = :imagePath, 
                category = :category,
                price = :price,
                amount = :amount,
                description = :description
                WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $input['id']);
        $stmt->bindParam('name', $input['name']);
        $stmt->bindParam('imagePath', $input['imageName']);
        $stmt->bindParam('category', $input['category']);
        $stmt->bindParam('price', $input['price']);
        $stmt->bindParam('amount', $input['amount']);
        $stmt->bindParam('description', $input['description']);
        $stmt->execute();
    }

    public function reduceAmount($id, $amount): void
    {
        $sql = 'UPDATE product 
                SET amount = amount-:amount 
                WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('amount', $amount);
        $stmt->execute();
    }
}
