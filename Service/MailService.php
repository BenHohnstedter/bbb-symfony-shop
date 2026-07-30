<?php

namespace App\Service;

use App\Repository\OrderingRepo;

class MailService
{
    public function __construct(
        protected PrincipalService $principalService,
        protected PhpMailerService $phpMailerService,
        protected OrderingRepo $orderingRepo,
    ) {
    }

    public function buildMail(): void
    {
        $this->phpMailerService->createMail($this->orderingRepo->findByLastUserOrdering($this->principalService->getPrincipal()->getId()));
    }
}
