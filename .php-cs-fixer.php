<?php

declare(strict_types=1);

$rules = [
    '@Symfony' => true,
    '@PSR1' => true,
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'multiline_whitespace_before_semicolons' => true,
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => false,
    'space_after_semicolon' => true,
    'no_empty_statement' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'ordered_imports' => [
        'sort_algorithm' => 'length',
    ],
    'nullable_type_declaration_for_default_null_value' => [
        'use_nullable_type_declaration' => true
    ],
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_trim' => true,
    'phpdoc_var_without_name' => true,
    'phpdoc_to_comment' => [
        'ignored_tags' => ['psalm-suppress', 'var', 'TODO']
    ],
    'single_quote' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline' => true,
    'no_trailing_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'trim_array_spaces' => true,
    'normalize_index_brace' => true,
    'short_scalar_cast' => true,
    'no_unset_cast' => true,
    'no_short_bool_cast' => true,
    'cast_spaces' => true,
    'lowercase_cast' => true,
    'ordered_interfaces' => true,
    'ordered_traits' => true,
    'elseif' => true,
    'no_alternative_syntax' => true,
    'no_superfluous_elseif' => true,
    'combine_consecutive_issets' => true,
    'ternary_to_null_coalescing' => true,
    'declare_strict_types' => true,
    'strict_comparison' => true,
];

$excludes = [
    'vendor',
];

return (new PhpCsFixer\Config())
    ->setRules($rules)
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
            ->exclude($excludes)
            ->notName('README.md')
            ->notName('*.xml')
            ->notName('*.yml')
            ->notName('_ide_helper.php')
    )
;
