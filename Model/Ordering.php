<?php

namespace App\Model;

class Ordering
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id,
        protected int $isOrdered,
        public int $user,
        protected ?string $pdf,
        protected string $lastUpdate,
        protected string $createdAt,
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** IS ORDERED ***//
    public function setIsOrdered(int $isOrdered): void
    {
        $this->isOrdered = $isOrdered;
    }

    public function getIsOrdered(): int
    {
        return $this->isOrdered;
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

    // *** IS ORDERED ***//
    public function setPdf(?string $pdf): void
    {
        $this->pdf = $pdf;
    }

    public function getPdf(): ?string
    {
        return $this->pdf;
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

    // *** OrderingItems ***//
    public function getOrderingItems(): iterable
    {
        return $this->registry->getRepository(Orderingitem::class)->findByParam('ordering', $this->id);
    }
}
