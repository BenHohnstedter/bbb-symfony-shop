<?php

namespace App\Service;

class ImageCropAutoService implements \App\Interface\ImageCropServiceInterface
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

        // CROP IMAGE - NO WHITE
        $cropFile = imagecropauto($newFile, IMG_CROP_WHITE);

        if (false !== $cropFile) {
            imagewebp($cropFile, $fileDestination);
            imagedestroy($cropFile);
        } else {
            imagedestroy($newFile);
        }
    }
}
