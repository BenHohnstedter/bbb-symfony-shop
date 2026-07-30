<?php

namespace App\EventListener;

use App\Service\OrderingService;

class ProductAmountEventListener
{
    public function __construct(
        protected OrderingService $orderingService,
    ) {
    }

    public function __invoke(): void
    {
        $this->orderingService->reduceProductAmount();
        $this->orderingService->changeOrderToOrdered();
    }
}
