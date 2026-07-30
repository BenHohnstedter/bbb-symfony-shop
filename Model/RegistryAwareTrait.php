<?php

namespace App\Model;

use App\Repository\Registry;

trait RegistryAwareTrait
{
    protected ?Registry $registry = null;

    public function setRegistry(Registry $registry): void
    {
        $this->registry = $registry;
    }
}
