<?php

declare(strict_types=1);

namespace App\Repository;

class Registry
{
    private static $instance;

    /** @var array{string,AbstractRepo} */
    private array $repos = [];

    public function __construct(array $repos = [])
    {
        foreach ($repos as $class => $repo) {
            $this->register($class, $repo);
        }
    }

    public static function setInstance($instance): void
    {
        self::$instance = $instance;
    }

    public static function getInstance(): Registry
    {
        return self::$instance;
    }

    public function register($className, AbstractRepo $repo): void
    {
        $this->repos[$className] = $repo;
        $repo->setRegistry($this);
    }

    public function getRepository($model): ?AbstractRepo
    {
        $repo = $this->repos[$model] ?? null;

        if (null == $repo) {
            return null;
        }

        $repo->setRegistry($this);

        return $repo;
    }
}
