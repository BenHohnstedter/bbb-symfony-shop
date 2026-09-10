# bbb-symfony-shop

Ein B2C-Online-Shop-System, aufgebaut als eigenes MVC-Framework auf Basis der Symfony-Component-Komponenten – ohne das volle Symfony-Framework. Entstanden als Übungsprojekt zur Ausbildung hinter den Kulissen einer Web-Entwicklung: Routing, Dependency Injection, ORM, Templates und Quality Tools.

## Funktionen

- Produktkatalog mit Kategorien
- Benutzerverwaltung (Registrierung, Login)
- Warenkorb & Checkout mit Bestellhistorie
- Bewertungen (Reviews) mit Sternen
- Merkliste (Wishlist)
- E-Mail-Versand über PHPMailer
- PDF-Belege über DomPdf
- Twig-Templates als gemeinsame Layout-Logik
- Debug-Support über Debugbar (maximebf/debugbar) und Whoops

## Technologien

- PHP 8
- Symfony-Komponenten (HttpKernel, HttpFoundation, Form, Validator, Twig-Bridge, EventDispatcher, Translation, Mime)
- Doctrine ORM (Data-Mapper) über PDO/MySQL
- PHP-DI (Dependency Injection Container)
- Twig als Template-Engine
- DomPdf (Beleg-Druck), PHPMailer (E-Mails)
- Qualitätswerkzeuge: PHPStan, PHP-CS-Fixer, Rector, PHPUnit, PhpMetrics

## Projektstruktur

```
index.php       – Front-Controller
bootstrap.php   – Container- und Kernel-Aufbau
Controller/     – App-Struktur (Product, Checkout, User, Review, Wishlist)
Model/          – Entitäten (Product, User, Ordering, Review, Wishlist, Category, Image)
Repository/     – Datenbankzugriffe
Service/        – Geschäftslogik
Template/       – Twig-Templates (Layout, Checkout, Produkte, Reviews)
Form/           – Formular-Klassen
EventListener/  – Events (z. B. Kernel-Events)
Config/         – Konfiguration (local.php)
myreport/       – PhpMetrics-Bericht (Architekturanalyse)
Tests/          – PHPUnit-Tests
```

## Starten

Voraussetzung: PHP 8 und ein MySQL-/MariaDB-Server.

1. Abhängigkeiten installieren:

```bash
composer install
```

2. Zugangsdaten für die Datenbank in `Config/local.php` setzen:

```php
return [
    'database' => [
        'host'     => '127.0.0.1',
        'dbname'   => 'bbb-b2c-shop',
        'user'     => 'root',
        'password' => '',
    ],
];
```

3. Datenbank `bbb-b2c-shop` anlegen (Datenbankschema kommt aus den Entitäten).

**Lokal erreichbar unter:** `http://localhost/pu-bbb-symfony-shop/`

## Entwicklung

```bash
vendor/bin/phpunit                       # PHPUnit-Tests
vendor/bin/phpstan analyse               # statische Analyse
vendor/bin/php-cs-fixer fix              # Code-Style
vendor/bin/phpmetrics                     # Architektur-Bericht
```