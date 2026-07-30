<?php

namespace App\Service;

use App\Builder\DomPdfBuilder;
use App\Repository\OrderingItemRepo;
use App\Repository\OrderingRepo;

class PdfService
{
    public function __construct(
        protected PrincipalService $principalService,
        protected OrderingRepo $orderingRepo,
        protected OrderingItemRepo $orderingItemRepo,
        protected OrderingService $orderingService,
    ) {
    }

    public function buildPdf(): void
    {
        $builder = new DomPdfBuilder();
        $builder->chroot(__DIR__.'/../');
        $builder->remoteEnabled(true);

        $bill = new DomPdfService(
            $builder->build(),
            $this->orderingRepo
        );

        $bill->createPdf($this->orderingRepo->findByLastUserOrdering($this->principalService->getPrincipal()->getId()));
    }
}
