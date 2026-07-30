<?php

namespace App\Model;

class Orderingitem
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id = 0,
        public int $ordering = 0,
        protected int $product = 0,
        protected int $amount = 0,
        protected string $lastUpdate = '',
        protected string $createdAt = '',
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** ORDERING ***//
    public function setOrdering(int $ordering): void
    {
        $this->ordering = $ordering;
    }

    public function getOrdering(): Ordering
    {
        return $this->registry->getRepository(Ordering::class)->findById($this->ordering);
    }

    // *** PRODUCT ***//
    public function setProduct(int $product): void
    {
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->registry->getRepository(Product::class)->findById($this->product);
    }

    // *** AMOUNT ***//
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    // *** LAST UPDATE ***//
    public function setLastUpdate(string $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getLastUpdate(): string
    {
        return date('H:i - d.m.Y', strtotime($this->lastUpdate));
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
