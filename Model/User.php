<?php

namespace App\Model;

use App\Interface\PrincipalInterface;

class User implements PrincipalInterface
{
    use RegistryAwareTrait;

    public function __construct(
        protected int $id = 0,
        protected int $userType = 0,
        protected string $profileImg = 'default-image.png',
        protected string $username = '',
        protected string $caption = '',
        protected string $firstname = '',
        protected string $lastname = '',
        protected string $birthday = '',
        protected string $email = '',
        protected string $street = '',
        protected int $houseNumber = 0,
        protected string $city = '',
        protected string $postalCode = '',
        protected float $lat = 0,
        protected float $lon = 0,
        protected string $password = '',
        protected string $lastUpdate = '',
        protected string $createdAt = '',
    ) {
    }

    // *** ID ***//
    public function getId(): int
    {
        return $this->id;
    }

    // *** USER TYPE ***//
    public function setUserType(int $userType): void
    {
        $this->userType = $userType;
    }

    public function getUserType(): ?int
    {
        return $this->userType;
    }

    // *** PROFILE IMG ***//
    public function setProfileImg(int $profileImg): void
    {
        $this->profileImg = $profileImg;
    }

    public function getProfileImg(): string
    {
        return $this->profileImg;
    }

    // *** USERNAME ***//
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    // *** CAPTION ***//
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    // *** FIRSTNAME ***//
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    // *** LASTNAME ***//
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    // *** BIRTHDAY ***//
    public function setBirthday(string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    // *** EMAIL ***//
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    // *** STREET ***//
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    // *** HOUSE NUMBER ***//
    public function setHouseNumber(int $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    public function getHouseNumber(): int
    {
        return $this->houseNumber;
    }

    // *** CITY ***//
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    // *** POSTAL CODE ***//
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    // *** LATITUDE ***//
    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    // *** LONGITUDE ***//
    public function setLon(float $lon): void
    {
        $this->lon = $lon;
    }

    public function getLon(): float
    {
        return $this->lon;
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

    // *** PASSWORD ***//
    public function getPassword(): string
    {
        return $this->password;
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

    // *** BUYER|SELLER ***//
    public function isBuyer(): bool
    {
        if (0 === $this->getUserType()) {
            return true;
        }

        return false;
    }

    public function isSeller(): bool
    {
        if (1 === $this->getUserType()) {
            return true;
        }

        return false;
    }

    // *** USER PRODUCTS ***//
    public function getProducts(): array
    {
        return $this->registry->getRepository(Product::class)->findByFilter(
            "WHERE product.user = $this->id",
            ' ORDER BY product.id DESC'
        );
    }
}
