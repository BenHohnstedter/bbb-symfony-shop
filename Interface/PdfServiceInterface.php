<?php

namespace App\Interface;

interface PdfServiceInterface
{
    public function createPdf($ordering): void;
}
