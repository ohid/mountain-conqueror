<?php declare(strict_types=1);
/**
 * Functions and definitions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// List of all files that should include to the theme
$mconquerorIncludes = [
    'setup' => '/setup.php',
    'enqueue' => '/enqueue.php',
];

$mconquerorIncludes = apply_filters('mconqueror_includes', $mconquerorIncludes);

if ($mconquerorIncludes) {
    foreach ($mconquerorIncludes as $file) {
        $filePath = wp_normalize_path(locate_template('inc' . $file));

        if (!$filePath) {
            if (defined('WP_DEBUG') && WP_DEBUG === true) {
                error_log(sprintf('Error locating inc%s', $file));
            }
        }

        require_once $filePath;
    }
}
