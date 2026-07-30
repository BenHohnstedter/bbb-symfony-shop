<?php

namespace App\Interface;

interface PrincipalInterface
{
    public function getUsername(): string;

    public function isBuyer(): bool;

    public function isSeller(): bool;
}
