<?php

declare(strict_types=1);

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;

class ConstructorTest extends TestCase
{
    public function testHelloWorld()
    {
        $dummy = new Dummy('World');

        self::assertSame('Hello World', $dummy->hello());
    }
}
