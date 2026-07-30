<?php

namespace App\Tests\Service;

class Dummy
{
    public function __construct(
        private string $hello
    ) {
    }

    public function hello()
    {
        return "Hello {$this->hello}";
    }
}
