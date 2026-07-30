<?php

namespace App\Repository;

use PDO;

class ReviewRepo extends DataBaseRepo
{
    protected string $table = 'review';

    public function __construct(
        protected PDO $pdo
    ) {
        parent::__construct($pdo);
    }

    public function createReview($product, $user, $stars, $title, $comment): void
    {
        $createdAt = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO review(product, user, stars, title, comment, created_at) 
                VALUES (:product, :user, :stars, :title, :comment, :createdAt)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('product', $product);
        $stmt->bindParam('user', $user);
        $stmt->bindParam('stars', $stars);
        $stmt->bindParam('title', $title);
        $stmt->bindParam('comment', $comment);
        $stmt->bindParam('createdAt', $createdAt);

        $stmt->execute();
    }

    public function updateReviewStars($productId): void
    {
        $sqlUpdateStars = 'UPDATE product
                            LEFT JOIN (
                            SELECT product, FLOOR(AVG(stars)) AS star_average
                            FROM review
                            GROUP BY product
                            ) AS review_avg ON product.id = review_avg.product
                            SET product.star_average = review_avg.star_average
                            WHERE product.id = :id';
        $stmt = $this->pdo->prepare($sqlUpdateStars);
        $stmt->bindParam('id', $productId);

        $stmt->execute();
    }

    public function deleteProductReviews($id): void
    {
        $sql = 'DELETE FROM review WHERE product = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('id', $id);

        $stmt->execute();
    }

    public function userReviewsFromProduct($product, $user): bool|array
    {
        $sql = 'SELECT
                product,
                user,
                COUNT(user) AS amount
                FROM review
                WHERE product = :product && user = :user
                GROUP BY user';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam('product', $product);
        $stmt->bindParam('user', $user);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_DEFAULT);
    }
}
