<?php
/**
 * The 404 template file for Mauntain Conqueror theme.
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
    <div class="col-md-12">
        <div class="not-found text-center">
            <h2><?php esc_html_e('Not found', 'mountain-conqueror'); ?></h2>
            <p><?php esc_html_e('Oops! Looks like you followed a bad link.', 'mountain-conqueror'); ?></p>
            <?php printf('<a href="%s" class="btn btn-mc-primary">%s</a>', esc_url(home_url('/')), esc_html__('« Go home')); ?>
        </div>
    </div>
<?php
get_footer();