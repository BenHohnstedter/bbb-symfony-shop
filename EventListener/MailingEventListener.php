<?php

namespace App\EventListener;

use App\Service\MailService;
use App\Service\PdfService;

class MailingEventListener
{
    public function __construct(
        protected PdfService $pdfService,
        protected MailService $mailService,
    ) {
    }

    public function __invoke(): void
    {
        $this->pdfService->buildPdf();
        $this->mailService->buildMail();
    }
}
