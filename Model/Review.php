<?php

namespace App\Model;

class Review
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id,
        protected int $product,
        protected int $user,
        protected int $stars,
        protected string $title,
        protected string $comment,
        protected string $createdAt,
    ) {
    }

    // *** ID ***//
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    // *** PRODUCT ID ***//
    public function setProduct(int $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->registry->getRepository(Product::class)->findById($this->product);
    }

    // *** USER ID ***//
    public function setUserId(int $user): void
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->registry->getRepository(User::class)->findById($this->user);
    }

    // *** STARS ***//
    public function setStars(int $stars): void
    {
        $this->stars = $stars;
    }

    public function getStars(): int
    {
        return $this->stars;
    }

    // *** TITLE ***//
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    // *** COMMENT ***//
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    // *** CREATED AT ***//
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return date('d.m.Y', strtotime($this->createdAt));
    }
}
