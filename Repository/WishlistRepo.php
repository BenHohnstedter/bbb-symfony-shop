<?php

namespace App\Repository;

use App\Model\Wishlist;
use PDO;

class WishlistRepo extends DataBaseRepo
{
    protected string $table = 'wishlist';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }

    public function findByUserProductId($product, $user): bool|Wishlist
    {
        $sql = 'SELECT *
                FROM wishlist
                WHERE user = :user AND product = :product';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);
        $stmt->bindParam('product', $product);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, '\App\Model\Wishlist');

        return $stmt->fetch();
    }

    public function findByProductId($id): Wishlist
    {
        $sql = 'SELECT *
                FROM wishlist
                WHERE product = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, '\App\Model\Wishlist');

        return $stmt->fetch();
    }

    public function addToWishlist($user, $product): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO wishlist(user, product, created_at) 
                VALUES (:user, :product, :createdAt)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);
        $stmt->bindParam('product', $product);
        $stmt->bindParam('createdAt', $createdAt);
        $stmt->execute();
    }

    public function deleteOutWishlist($user, $product): void
    {
        $sql = 'DELETE FROM wishlist WHERE user = :user AND product = :product';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('user', $user);
        $stmt->bindParam('product', $product);
        $stmt->execute();
    }
}
