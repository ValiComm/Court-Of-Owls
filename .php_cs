<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('vendor')
    ->exclude('symfony')
    ->in(__DIR__);

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        // 'align_double_arrow',
        // 'align_equals',
        'multiline_spaces_before_semicolon',
        'ordered_use',
        'phpdoc_order',
        'phpdoc_var_to_type',
        'short_array_syntax',
    ])
    ->finder($finder)
    ->setUsingCache(true);
