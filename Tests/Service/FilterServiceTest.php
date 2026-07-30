<?php

namespace App\Tests\Service;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class FilterServiceTest extends TestCase
{
    protected ?Request $request = null;
    protected ?FilterService $filterService = null;

    protected function setUp(): void
    {
        $this->request = Request::create('/');
        $this->filterService = new FilterService($this->request);
    }

    public function testGetSearchQueryEmpty(): void
    {
        Assert::assertNull((new FilterService(Request::create('/')))->getSearchedQuery());
    }

    public function testGetSearchQuery(): void
    {
        $this->request->query->replace([
            'searched' => [
                'Test',
            ],
        ]);

        self::assertSame("( product.name LIKE '%Test%' )", $this->filterService->getSearchedQuery());
    }
}
