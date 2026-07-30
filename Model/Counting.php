<?php

namespace App\Model;

use AllowDynamicProperties;

#[AllowDynamicProperties]
class Counting
{
    protected int $id = 0;

    protected string $name = '';

    protected int $filteredAmount = 0;

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

    // *** AMOUNT ***//
    public function setFilteredAmount(int $filteredAmount): void
    {
        $this->filteredAmount = $filteredAmount;
    }

    public function getFilteredAmount(): int
    {
        return $this->filteredAmount;
    }
}
