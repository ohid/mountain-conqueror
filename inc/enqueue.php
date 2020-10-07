<?php declare(strict_types=1);
/**
 * Functions and definitions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('mconqueror_scripts')) {
    add_action('wp_enqueue_scripts', 'mconqueror_scripts');

    function mconqueror_scripts()
    {

        /**
         * CSS files enqueue
         */
        wp_enqueue_style('mconqueror-style', get_stylesheet_uri(), [], mconqueror_filemtime('/style.css'));

        wp_enqueue_style('mconqueror-google-fonts', mconqueror_google_fonts_url(), [], null);

        wp_enqueue_style(
            'bootstrap-css',
            get_template_directory_uri() . '/assets/css/bootstrap.min.css',
            [],
            mconqueror_filemtime('/assets/css/bootstrap.min.css')
        );

        wp_enqueue_style(
            'mconqueror-main',
            get_template_directory_uri() . '/assets/css/main.css',
            [],
            mconqueror_filemtime('/assets/css/main.css')
        );

        /**
         * JavaScript files enqueue
         */

        // Enqueue the comment reply script
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            // As we are not designing the comments form and comments list so this script will not be needed for our theme
            // wp_enqueue_script( 'comment-reply' );
        }
    }
}
