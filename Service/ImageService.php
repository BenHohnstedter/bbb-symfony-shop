<?php

namespace App\Service;

use App\Model\Image;
use Symfony\Component\HttpFoundation\Request;

class ImageService
{
    protected Image $image;

    public function __construct(
        protected Request $request,
    ) {
        $this->image = new Image();
    }

    public function validateImage(): bool
    {
        $error = 0;
        if ('' == $this->image->getName()) {
            $this->request->getSession()->getFlashBag()->add('error', 'image_name_error.flash');
            $error = 1;
        }

        $allowed = ['jpg', 'jpeg', 'png'];
        if (!in_array($this->image->getType(), $allowed)) {
            $this->request->getSession()->getFlashBag()->add('error', 'image_type_error.flash');

            $error = 1;
        }

        if ($this->image->getSize() > 500000) {
            $this->request->getSession()->getFlashBag()->add('error', 'image_size_error.flash');

            $error = 1;
        }

        if (0 !== $this->image->getError()) {
            $this->request->getSession()->getFlashBag()->add('error', 'image_error.flash');

            $error = 1;
        }

        if (1 === $error) {
            return false;
        }

        return true;
    }

    public function uploadImage($path): ?string
    {
        $fileTmpName = $this->image->getTmpName();

        $fileNameNew = 'bbb-shop-'.uniqid('', true).'.webp';
        $fileDestination = 'Resource/Img/'.$path.'/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);

        return $fileNameNew;
    }

    public function deleteImage($path, $image): void
    {
        if ('default-image.png' != $image) {
            unlink('Resource/Img/'.$path.'/'.$image);
        }
    }

    public function deleteSymfonyImage($path, $image): void
    {
        if ('default-image.png' != $image) {
            unlink($path.$image);
        }
    }
}
