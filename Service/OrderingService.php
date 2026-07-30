<?php

namespace App\Service;

use App\Repository\OrderingItemRepo;
use App\Repository\OrderingRepo;
use App\Repository\ProductRepo;

class OrderingService
{
    public function __construct(
        protected \Symfony\Component\HttpFoundation\Request $request,
        protected PrincipalService $principalService,
        protected ProductRepo $productRepo,
        protected OrderingItemRepo $orderingItemRepo,
        protected OrderingRepo $orderingRepo
    ) {
    }

    public function reduceProductAmount(): void
    {
        $lastUserOrder = $this->orderingRepo->findByLastUserOrdering($this->principalService->getPrincipal()->getId());
        if (!$lastUserOrder) {
            return;
        }

        foreach ($this->orderingItemRepo->findAllFromUser($lastUserOrder->getId()) as $product) {
            $this->productRepo->reduceAmount(
                $product->getProduct()->getId(),
                $product->getAmount()
            );
        }
    }

    public function lastUserOrderingId(): int
    {
        $lastUserOrder = $this->orderingRepo->findByLastUserOrdering($this->principalService->getPrincipal()->getId());

        if (!$lastUserOrder || 1 == $lastUserOrder->getIsOrdered()) {
            $this->orderingRepo->createAction($this->principalService->getPrincipal()->getId());
            $lastUserOrder = $this->orderingRepo->findByLastUserOrdering($this->principalService->getPrincipal()->getId());
        }

        return $lastUserOrder->getId();
    }

    public function lastOrderedUserOrdering(): \App\Model\Ordering
    {
        return $this->orderingRepo->findByLastOrderedUserOrdering($this->principalService->getPrincipal()->getId());
    }

    public function isOrdered(): bool
    {
        if ($this->principalService->getPrincipal()->isBuyer()) {
            $userOrder = $this->orderingRepo->getOrderedUserOrders($this->principalService->getPrincipal()->getId());

            foreach ($userOrder as $orderItem) {
                if (!empty($this->orderingItemRepo->findByProductId($orderItem->getId(), $this->request->get('id')))) {
                    return true;
                }
            }
        }

        return false;
    }

    public function changeOrderToOrdered(): void
    {
        $this->orderingRepo->changeToOrdered($this->principalService->getPrincipal()->getId());
    }
}
