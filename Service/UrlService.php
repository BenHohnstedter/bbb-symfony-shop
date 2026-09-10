<?php

namespace App\Service;

class UrlService
{
    // *** Locale ***//
    public function getLocale(string $default = 'en_US'): ?string
    {
        if (!isset($this->getUrl()[2])) {
            return $default;
        }

        $allowed = ['de_DE', 'en_US', 'fi_FI'];
        if (!in_array($this->getUrl()[2], $allowed)) {
            return $default;
        }

        return $this->getUrl()[2];
    }

    // *** Controller ***//
    public function getController(string $default = 'product'): string
    {
        if (!isset($this->getUrl()[3])) {
            return $default;
        }

        return $this->getUrl()[3];
    }

    // *** Action ***//
    public function getAction(string $default = 'home'): string
    {
        if (!isset($this->getUrl()[4])) {
            return $default;
        }

        return $this->getUrl()[4];
    }

    // *** ID ***//
    public function getId(int $default = 0): string|int
    {
        if (!isset($this->getUrl()[5])) {
            return $default;
        }

        return $this->getUrl()[5];
    }

    public function getUrl(): array
    {
        $uri  = (string) ($_SERVER['REQUEST_URI'] ?? '');
        $base = rtrim((string) dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');

        // Unter einem Abbildungs-Pfad (z. B. /pu-bbb-symfony-shop) sitzt die
        // Kategorie sonst bei Index 3 statt 2 -- Controller und Aktion rutschen
        // nach rechts. Ohne Prefix bleibt alles wie auf dem Live-Server.
        if ($base !== '' && str_starts_with($uri, $base)) {
            $uri = substr($uri, strlen($base));
        }

        return array_filter(explode('/', $uri));
    }
}
