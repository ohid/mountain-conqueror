<?php declare(strict_types=1);
/**
 * Functions and definitions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Initializes the theme files
if( class_exists('MConqueror\\Init') ) {
    MConqueror\Init::registerFiles();
}

// Include miscellaneous functions
require_once dirname(__FILE__) . '/inc/miscellaneous.php';
