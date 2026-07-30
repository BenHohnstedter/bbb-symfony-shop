<?php

namespace App\Model;

class Image
{
    protected string $name = '';
    protected string $type = '';
    protected int $size = 0;
    protected int $error = 0;
    protected string $tmpName = '';

    // *** NAME ***//
    public function setName(): void
    {
        $this->name = $_FILES['imagePath']['name'];
    }

    public function getName(): string
    {
        return $this->name = $_FILES['imagePath']['name'];
    }

    // *** TYPE ***//
    public function getType(): string
    {
        $fileExt = explode('.', $this->getName());

        return $this->type = strtolower(end($fileExt));
    }

    // *** SIZE ***//
    public function getSize(): int
    {
        return $this->size = $_FILES['imagePath']['size'];
    }

    // *** ERROR ***//
    public function getError(): int
    {
        return $this->error = $_FILES['imagePath']['error'];
    }

    // *** TMP NAME ***//
    public function getTmpName(): string
    {
        return $this->tmpName = $_FILES['imagePath']['tmp_name'];
    }
}
