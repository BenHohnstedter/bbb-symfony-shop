<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/Builder',
        __DIR__.'/Config',
        __DIR__.'/Controller',
        __DIR__.'/EventListener',
        __DIR__.'/Interface',
        __DIR__.'/Model',
        __DIR__.'/Repository',
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withTypeCoverageLevel(0)
    ->withRootFiles()
    ->withImportNames();
