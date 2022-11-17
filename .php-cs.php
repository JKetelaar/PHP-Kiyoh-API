<?php

declare(strict_types=1);

$config = new PhpCsFixer\Config();
$config ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'full_opening_tag' => true,
        'no_superfluous_phpdoc_tags' => false,
        'phpdoc_align' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_alias_tag' => true,
        'yoda_style' => false,
        'phpdoc_to_return_type' => true,
        'phpdoc_to_param_type' => true,
    ])
    ->setFinder(PhpCsFixer\Finder::create()
        ->exclude('vendor')
        ->in(__DIR__ . '/src')
    );
return $config;
