<?php

namespace App\Interface;

interface EnvironmentInterface
{
    public function getUsername(): string;

    public function isBuyer(): bool;

    public function isSeller(): bool;
}
