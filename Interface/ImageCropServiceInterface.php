<?php

namespace App\Interface;

interface ImageCropServiceInterface
{
    public function cropImage(string $filePath, string $fileName): void;
}
