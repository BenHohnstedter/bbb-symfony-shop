<?php

declare(strict_types=1);

namespace App\Repository;

abstract class AbstractRepo
{
    protected ?Registry $registry = null;

    public function setRegistry(Registry $registry): void
    {
        $this->registry = $registry;
    }
}
