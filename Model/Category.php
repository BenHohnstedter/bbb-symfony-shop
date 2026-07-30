<?php

namespace App\Model;

class Category
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id,
        protected string $name,
        protected string $createdAt
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** NAME ***//
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
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
