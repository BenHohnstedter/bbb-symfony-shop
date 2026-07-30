<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude([
        'cache/'
    ]);

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'global_namespace_import' => true,
        'ordered_imports' => true,
        'fully_qualified_strict_types' => true,
    ])
    ->setFinder($finder);
