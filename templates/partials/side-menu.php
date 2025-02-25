<?php
/**
 * The side menu partial template file
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<?php do_action('mc_start_sidemenu'); ?>

<div class="col-md-3">
    <div class="side-menu">
        <?php
            if( function_exists('wp_nav_menu') ) {
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'main-menu',
                    'fallback_cb'  => 'mconqueror_link_to_menu_editor',
                ));
            }
        ?>

    </div>
    <div class="mobile-menu-closer">
        <span id="menu-closer">X</span>
    </div>
</div>

<?php do_action('mc_end_sidemenu'); ?>