<?php

namespace App\Model;

use AllowDynamicProperties;

#[AllowDynamicProperties]
class Wishlist
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id = 0,
        public int $user = 0,
        protected int $product = 0,
        protected string $lastUpdate = '',
        protected string $createdAt = '',
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** USER ***//
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->registry->getRepository(User::class)->findById($this->user);
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

    // *** LAST UPDATE ***//
    public function setLastUpdate(string $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getLastUpdate(): string
    {
        return date('d.m.Y - (H:i', strtotime($this->lastUpdate) + 7200);
    }

    // *** CREATED AT ***//
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return date('H:i - d.m.Y', strtotime($this->createdAt));
    }
}
