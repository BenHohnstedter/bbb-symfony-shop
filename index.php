<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernel;

date_default_timezone_set('Europe/Berlin');

/** @var HttpKernel $kernel */
$kernel = include __DIR__.'/bootstrap.php';
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$kernel->terminate($request, $response);

$response->send();
