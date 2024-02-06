<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = require __DIR__ . '/.php-cs-fixer.rules.php';
$finder = Finder::create()
    ->in([__DIR__])
    ->exclude([__DIR__ . '/vendor'])
;

return (new Config)
    ->registerCustomFixers(new PhpCsFixerCustomFixers\Fixers)
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
;
