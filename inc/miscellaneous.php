<?php declare(strict_types=1);
/**
 * Miscellaneous functions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

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
