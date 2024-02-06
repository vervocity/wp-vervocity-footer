<?php

return [
    '@PSR12' => true,

    // Alias
    'backtick_to_shell_exec' => true, // Converts backtick operators to shell_exec calls.
    'no_mixed_echo_print' => true, // Either language construct print or echo should be used.

    // Array Notation
    'array_syntax' => ['syntax' => 'short'], // PHP arrays should be declared using the configured syntax.
    'no_multiline_whitespace_around_double_arrow' => true, // Operator => should not be surrounded by multi-line whitespaces.
    'no_trailing_comma_in_singleline_array' => true, // PHP single-line arrays should not have trailing comma.
    'no_whitespace_before_comma_in_array' => true, // In array declaration, there MUST NOT be a whitespace before each comma.
    'normalize_index_brace' => true, // Array index should always be written by using square braces.
    'trim_array_spaces' => true, // Arrays should be formatted like function/method arguments, without leading or trailing single line space.
    'whitespace_after_comma_in_array' => true, // In array declaration, there MUST be a whitespace after each comma.

    // Basic
    'single_line_empty_body' => true,

    // Casing
    'magic_constant_casing' => true, // Magic constants should be referred to using the correct casing.
    'magic_method_casing' => true, // Magic method definitions and calls must be using the correct casing.
    'native_function_casing' => true, // Function defined by PHP should be called using the correct casing.
    'native_function_type_declaration_casing' => true, // Native type hints for functions should use the correct case.

    // Cast Notation
    'cast_spaces' => ['space' => 'single'], // A single space should be between cast and variable.
    'no_short_bool_cast' => true, // Short cast bool using double exclamation mark should not be used.

    // Class Notation
    'class_attributes_separation' => true, // Class, trait and interface elements must be separated with one or none blank line.
    'no_php4_constructor' => true, // (risky) Convert PHP4-style constructors to __construct.

    // Comment
    'multiline_comment_opening_closing' => true, // DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening slash. Both must end with a single asterisk before the closing slash.
    'no_empty_comment' => true, // There should not be any empty comments.

    // Control Structure
    'include' => true, // Include/Require and file path should be divided with a single space. File path should not be placed under brackets.
    'no_superfluous_elseif' => true, // Replaces superfluous elseif with if.
    'no_trailing_comma_in_list_call' => true, // Remove trailing commas in list function calls.
    'no_unneeded_control_parentheses' => true, // Removes unneeded parentheses around control statements.
    'no_unneeded_curly_braces' => ['namespaces' => true], // Removes unneeded curly braces that are superfluous and aren’t part of a control structure’s body.
    'no_useless_else' => true, // There should not be useless else cases.
    'simplified_if_return' => true, // Simplify if control structures that return the boolean result of their condition.
    'switch_continue_to_break' => true, // Switch case must not be ended with continue but with break.
    'trailing_comma_in_multiline' => true, // PHP multi-line arrays should have a trailing comma.

    // Function Notation
    'function_typehint_space' => true, // Ensure single space between function’s argument and its typehint.
    'lambda_not_used_import' => true, // Lambda must not import variables it doesn’t use.
    'nullable_type_declaration_for_default_null_value' => true, // Adds or removes ? before type declarations for parameters with a default null value.
    'method_argument_space' => [
        'on_multiline' => 'ignore', // To allow lines between arguments when using attributes
    ],

    // Import
    'fully_qualified_strict_types' => true, // Transforms imported FQCN parameters and return types in function arguments to short version.
    'global_namespace_import' => true, // Imports or fully qualifies global classes/functions/constants.
    'no_unused_imports' => true, // Unused use statements must be removed.
    'ordered_imports' => [
        'sort_algorithm' => 'alpha',
        'imports_order' => ['const', 'class', 'function'],
    ],

    // Language Construct
    'combine_consecutive_issets' => true, // Using isset($var) && multiple times should be done in one call.
    'combine_consecutive_unsets' => true, // Calling unset on multiple items should be done in one call.
    'single_space_after_construct' => true, // Ensures a single space after language constructs.

    // Namespace Notation
    'clean_namespace' => true, // Namespace must not contain spacing, comments or PHPDoc.
    'no_leading_namespace_whitespace' => true, // The namespace declaration line shouldn’t contain leading whitespace.

    // Operator
    'concat_space' => ['spacing' => 'one'], // Concatenation should be spaced according configuration.
    'logical_operators' => true, // (risky) Use && and || logical operators instead of and and or.
    'new_with_parentheses' => [
        'anonymous_class' => false,
        'named_class' => false,
    ],
    'not_operator_with_successor_space' => true, // Logical NOT operators (!) should have one trailing whitespace.
    'operator_linebreak' => [ // Operators - when multiline - must always be at the beginning or at the end of the line.
        'only_booleans' => true,
        'position' => 'end',
    ],
    'standardize_increment' => true, // Increment and decrement operators should be used if possible.
    'standardize_not_equals' => true, // Replace all <> with !=.
    'ternary_to_null_coalescing' => true, // Use null coalescing operator ?? where possible. Requires PHP >= 7.0.
    'unary_operator_spaces' => true, // Unary operators should be placed adjacent to their operands.

    // PHP Tag
    'echo_tag_syntax' => ['format' => 'short'], // Replaces short-echo <?= with long format <?php echo/<?php print syntax, or vice-versa.
    'linebreak_after_opening_tag' => false,
    'blank_line_after_opening_tag' => false,

    // PHPDoc
    'align_multiline_comment' => true, // Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
    'no_blank_lines_after_phpdoc' => true, // There should not be blank lines between docblock and the documented element.
    'no_empty_phpdoc' => true, // There should not be empty PHPDoc blocks.
    'phpdoc_indent' => true, // Docblocks should have the same indentation as the documented subject.
    'phpdoc_summary' => true, // PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
    'phpdoc_trim' => true, // PHPDoc should start and end with content, excluding the very first and last line of the docblocks.

    // Return Notation
    'no_useless_return' => true, // There should not be an empty return statement at the end of a function.
    'simplified_null_return' => true, // A return statement wishing to return void should not return null.

    // Semicolon
    'multiline_whitespace_before_semicolons' => [ // Forbid multi-line whitespace before the closing semicolon or move the semicolon to the new line for chained calls.
        'strategy' => 'new_line_for_chained_calls',
    ],
    'no_empty_statement' => true, // Remove useless (semicolon) statements.
    'no_singleline_whitespace_before_semicolons' => true, // Single-line whitespace before closing semicolon are prohibited.
    'space_after_semicolon' => true, // Fix whitespace after a semicolon.

    // String Notation
    'explicit_string_variable' => true, // Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
    'simple_to_complex_string_variable' => true, // Converts explicit variables in double-quoted strings and heredoc syntax from simple to complex format (${ to {$).
    'single_quote' => true, // Convert double quotes to single quotes for simple strings.

    // Whitespace
    'array_indentation' => true, // Each element of an array must be indented exactly once.
    'blank_line_before_statement' => [ // An empty line feed must precede any configured statement.
        'statements' => ['return'],
    ],
    'method_chaining_indentation' => true, // Method chaining MUST be properly indented. Method chaining with different levels of indentation is not supported.
    'no_extra_blank_lines' => [ // Removes extra blank lines and/or blank lines following configuration.
        'tokens' => [
            'extra',
            'throw',
            'use',
            'use_trait',
        ],
    ],
    'no_spaces_around_offset' => true, // There MUST NOT be spaces around offset braces.

    // kubawerlos/php-cs-fixer-custom-fixers
    PhpCsFixerCustomFixers\Fixer\DeclareAfterOpeningTagFixer::name() => true,
    PhpCsFixerCustomFixers\Fixer\MultilinePromotedPropertiesFixer::name() => [
        'keep_blank_lines' => true,
    ],
    PhpCsFixerCustomFixers\Fixer\NoDuplicatedImportsFixer::name() => true,
];
