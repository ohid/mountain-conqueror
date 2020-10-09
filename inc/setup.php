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

        add_image_size('mconqueror-post-img-small', 370, 235, true);
        add_image_size('mconqueror-post-img-medium', 555, 350, true);
        add_image_size('mconqueror-post-img-large', 1140, 600, true);
        add_image_size('mconqueror-service-img-large', 1140, 600, true);
        add_image_size('mconqueror-blog-thumb', 110, 80, true);
        add_image_size('mconqueror-blog-widget-thumb', 55, 55, true);

        $defaults = [
            'default-color' => '#f8f8f8',
        ];

        add_theme_support('custom-background', $defaults);

        // Set the content width in pixels
        if (! isset($content_width)) {
            $content_width = apply_filters('mconqueror_content_width', 1140);
        }

        if (function_exists('register_nav_menus')) {
            register_nav_menus([
                'main-menu' => esc_html__('Main Menu', 'mountain-conqueror'),
                'mobile-menu' => esc_html__('Mobile Menu', 'mountain-conqueror'),
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
                'family' => rawurlencode(implode('|', $font_families)),
                'subset' => rawurlencode('latin,latin-ext'),
                'display' => 'swap',
            ];

            $fontsURL = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
        }

        return esc_url_raw($fontsURL);
    }
}

/**
 * Filter the excerpt_more text
 *
 * @param string $more
 * @return string
 */
function mconqueror_excerpt_more(string $more) : string
{
    return '';
}
add_filter('excerpt_more', 'mconqueror_excerpt_more');

/**
 * Add CSS classes to posts
 */
if (! function_exists('mconqueror_post_class')) {
    add_filter('post_class', 'mconqueror_post_class');

    function mconqueror_post_class(array $classes) : array
    {
        $classes[] = 'mconqueror-article';
        $classes[] = 'clearfix';

        return $classes;
    }
}

if (! function_exists('mconqueror_link_to_menu_editor')) {

    /**
     * Menu fallback. Link to the menu editor if that is useful.
     *
     * @param  array $args
     * @return string
     */
    function mconqueror_link_to_menu_editor(array $args)
    {
        if (! current_user_can('manage_options')) {
            return;
        }

        // see wp-includes/nav-menu-template.php for available arguments
        extract($args);

        $link = $link_before;

        $link .= sprintf(
            '<a href="%s" class="create-menu">%s</a>',
            esc_url(admin_url('nav-menus.php')),
            esc_attr($before) . esc_attr__('Create a menu', 'mountain-conqueror') . esc_attr($after)
        );
                
        $link .= $link_after;

        // We have a list
        if (false !== stripos($items_wrap, '<ul')
            or false !== stripos($items_wrap, '<ol')
        ) {
            $link = sprintf('<li>%s</li>', $link);
        }

        $output = sprintf($items_wrap, $menu_id, $menu_class, $link);
        if (! empty($container)) {
            $output = sprintf(
                "<%s>%s</%s>",
                esc_attr($container),
                $output,
                esc_attr($container)
            );
            // $output  = "<". esc_attr($container) ." class='". esc_attr($container_class) ."' id='". esc_attr($container_id) ."'>$output</". esc_attr($container) .">";
        }

        if ($echo) {
            echo wp_specialchars_decode(esc_html($output), ENT_QUOTES);
        }

        return $output;
    }
}

if (! function_exists('mconqueror_posts_pagination')) {

    /**
     * Display the posts navigation
     *
     * @return void
     */
    function mconqueror_posts_pagination() : string
    {
        $output = '<div class="mconqueror-pagination">';
            $output .= get_the_posts_pagination(array(
                'screen_reader_text' => ' ',
                'mid_size' => 2,
                'prev_text' => __('Older posts', 'mountain-conqueror'),
                'next_text' => __('Newer posts', 'mountain-conqueror'),
            ));
        $output . '</div>';

        return $output;
    }
}

if (! function_exists('mconqueror_footer_copyright')) {
    
    /**
     * Generates the footer copyright text with necessary HTML markup
     *
     * @return string
     */
    function mconqueror_footer_copyright() : string
    {
        // Display a static copyright text for now, we will make it dynamic later
        $output = sprintf('<div class="footer-copyright"><p>@2020 by Ohidul Islam</p></div>');

        return $output;
    }
}

if (! function_exists('mconqueror_footer_socials')) {
    
    /**
     * Generates the footer social profile links with necessary HTML markup
     *
     * @return string
     */
    function mconqueror_footer_socials() : string
    {
        // Display static social links for now, we will make it dynamic later
        $output = '<div class="footer-socials">';
        
        $output .= sprintf('<span>Follow my adventures</span>');

        $output .= '<span class="social-list">
                        <a href="#" class="social-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-vimeo"><i class="fab fa-vimeo"></i></a>
                        <a href="#" class="social-youtube"><i class="fab fa-youtube"></i></a>
                    </span>';

        $output .= '</div>';

        return $output;
    }
}


if (! function_exists('mconqueror_footer_imprint')) {
    
    /**
     * Generates the footer imprint link with necessary HTML markup
     *
     * @return string
     */
    function mconqueror_footer_imprint() : string
    {
        // Display a static imprint button for now, we will make it dynamic later
        $output = sprintf('<div class="footer-imprint"><a href="#">Imprint</a></div>');

        return $output;
    }
}
