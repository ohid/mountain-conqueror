<?php declare(strict_types=1);
/**
 * Functions and definitions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('mconqueror_setup')) {
    
    /**
     * Sets up theme defaults and registers support for various WordPress features.
    */
    function mconqueror_setup()
    {
        // Load the theme text domain
        load_theme_textdomain('mountain-conqueror', get_template_directory() . '/lang');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Add title tag
        add_theme_support('title-tag');

        // Custom logo support
        add_theme_support('custom-logo');

        // Add post-thumbnails
        add_theme_support('post-thumbnails');

        add_theme_support('post-formats', [
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        ]);

        // Add theme support for gutenberg
        add_theme_support(
            'gutenberg',
            ['wide-images' => true]
        );

        add_theme_support('align-wide');

        add_image_size('marvelous-post-img-small', 370, 235, true);
        add_image_size('marvelous-post-img-medium', 555, 350, true);
        add_image_size('marvelous-post-img-large', 1140, 600, true);
        add_image_size('marvelous-service-img-large', 1140, 600, true);
        add_image_size('marvelous-blog-thumb', 110, 80, true);
        add_image_size('marvelous-blog-widget-thumb', 55, 55, true);

        $defaults = [
            'default-color'     => '#f8f8f8',
        ];

        add_theme_support('custom-background', $defaults);

        // Set the content width in pixels
        if (! isset($content_width)) {
            $content_width = apply_filters('mconqueror_content_width', 1140);
        }

        if (function_exists('register_nav_menus')) {
            register_nav_menus([
                'main-menu' => esc_html__('Main Menu', 'marvelous'),
                'mobile-menu' => esc_html__('Mobile Menu', 'marvelous'),
            ]);
        }
    }

    add_action('after_setup_theme', 'mconqueror_setup');
}

/**
 * Mountain Conqueror fiemtime function
 */
if (! function_exists('mconqueror_filemtime')) {
    /**
     * Return the filemtime of a given file path
     *
     * @param [string] $file
     * @return [string] filemtime string
     */
    function mconqueror_filemtime(string $file) : string
    {
        // Retrieve the theme data.
        $the_theme = wp_get_theme();

        // Get the current version of the theme
        $theme_version = $the_theme->get('Version');

        if (file_exists(get_template_directory() . $file)) {
            return $theme_version . '.' . filemtime(wp_normalize_path(get_template_directory() . $file));
        }

    }
}

/**
 * Registering Google Fonts
 */
if (! function_exists('mconqueror_google_fonts_url')) {

    function mconqueror_google_fonts_url() : string
    {
        $fontsURL = '';

        /* Translators: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $teko = _x('on', 'Teko font: on or off', 'mountain-conqueror');

        $sanchez = _x('on', 'Sanchez font: on or off', 'mountain-conqueror');

        $imFellEnglish = _x('on', 'Sanchez font: on or off', 'mountain-conqueror');

        if ('off' !== $teko) {
            $font_families = [];

            if ('off' !== $teko) {
                $font_families[] = 'Teko:300,400,500,600,700';
            }

            if ('off' !== $sanchez) {
                $font_families[] = 'Sanchez:400,400italic';
            }

            if ('off' !== $imFellEnglish) {
                $font_families[] = 'IM Fell English:400';
            }

            $query_args = [
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
                'display' => 'swap',
            ];

            $fontsURL = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
        }

        return esc_url_raw($fontsURL);
    }
}
