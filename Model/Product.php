<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;

class Product
{
    use RegistryAwareTrait;

    #[Assert\File()]
    #[Assert\Image(minRatio: 1)]
    protected ?UploadedFile $file = null;

    public function __construct(
        protected int $id,
        public int $user,
        #[NotBlank] #[Type(type: 'int')]
        public int $category,
        protected int $isAccepted,
        protected float $starAverage,
        #[NotBlank] #[Type(type: 'int')] #[Range(min: 100, max: 10000)]
        protected int $amount,
        #[NotBlank] #[Type(type: 'float')] #[Range(min: 1, max: 10000)]
        protected float $price,
        #[Type(type: 'string')] #[Length(max: 255)]
        protected ?string $imagePath,
        #[NotBlank] #[Type(type: 'string')] #[Length(min: 1, max: 30)]
        protected string $name,
        #[NotBlank] #[Type(type: 'string')] #[Length(min: 1, max: 1000)]
        protected string $description,
        protected string $lastUpdate,
        protected string $createdAt,
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** USER ***//
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    public function getUser(): int
    {
        return $this->user;
    }

    public function getUserObject(): ?User
    {
        return $this->registry->getRepository(User::class)->findById($this->user);
    }

    // *** CATEGORY ***//
    public function setCategory(int $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function getCategoryObject(): ?Category
    {
        return $this->registry->getRepository(Category::class)->findById($this->category);
    }

    // *** IS ACCEPTED ***//
    public function setIsAccepted(int $isAccepted): void
    {
        $this->isAccepted = $isAccepted;
    }

    public function getIsAccepted(): int
    {
        return $this->isAccepted;
    }

    // *** STAR AVERAGE ***//
    public function setStarAverage(float $starAverage): void
    {
        $this->starAverage = $starAverage;
    }

    public function getStarAverage(): int
    {
        return $this->starAverage;
    }

    // *** AMOUNT ***//
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    // *** PRICE ***//
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    // *** PICTURE PATH ***//
    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    // *** NAME ***//
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // *** DESCRIPTION ***//
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // *** LAST UPDATE ***//
    public function setLastUpdate(string $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }

    public function getLastUpdate(): string
    {
        return date('H:i - d.m.Y', strtotime($this->lastUpdate));
    }

    // *** CREATED AT ***//
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): string
    {
        return date('H:i - d.m.Y', strtotime($this->createdAt));
    }

    // *** REVIEWS ***//
    public function getReviews(): iterable
    {
        return $this->registry->getRepository(Review::class)->findByParam('product', $this->id);
    }

    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }
}
