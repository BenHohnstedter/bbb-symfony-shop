<?php

namespace App\Model;

use App\Interface\PrincipalInterface;

class AnonymousUser implements PrincipalInterface
{
    public function getId(): int
    {
        return 0;
    }

    public function getUsername(): string
    {
        return 'Anonymous';
    }

    public function isBuyer(): bool
    {
        return false;
    }

    public function isSeller(): bool
    {
        return false;
    }
}
