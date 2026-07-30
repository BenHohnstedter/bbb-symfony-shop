<?php

namespace App\Service;

class ImageCropSquareService implements \App\Interface\ImageCropServiceInterface
{
    public function cropImage(string $filePath, string $fileName): void
    {
        $fileDestination = "Resource/Img/$filePath/$fileName";
        $imageFileType = mime_content_type($fileDestination);
        if ('image/png' == $imageFileType) {
            $newFile = imagecreatefrompng($fileDestination);
            imagepalettetotruecolor($newFile);
        } else {
            $newFile = imagecreatefromjpeg($fileDestination);
        }

        // CROP IMAGE - SQUARE
        $fileWidth = imagesx($newFile);
        $fileHeight = imagesy($newFile);

        $sizeMin = min(imagesx($newFile), imagesy($newFile));
        $sizeMax = max(imagesx($newFile), imagesy($newFile));

        $centerFile = ($sizeMax - $sizeMin) / 2;

        if ($fileWidth > $fileHeight) {
            $xCenter = $centerFile;
            $yCenter = 0;
        } else {
            $xCenter = 0;
            $yCenter = $centerFile;
        }

        $cropFile = imagecrop($newFile, ['x' => $xCenter, 'y' => $yCenter, 'width' => $sizeMin, 'height' => $sizeMin]);

        if (false !== $cropFile) {
            imagewebp($cropFile, $fileDestination);
            imagedestroy($cropFile);
        } else {
            imagedestroy($newFile);
        }
    }
}
