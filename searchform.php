<?php
/**
 * The search form template file for Mountain Conqueror
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<form class="form-inline my-2 my-lg-0" action="<?php echo esc_url( home_url() ); ?>" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="<?php esc_attr_e( 'Search', 'mountain-conqueror' ); ?>" aria-label="<?php esc_attr_e( 'Search', 'mountain-conqueror' ); ?>" name="s" value="<?php echo get_search_query(); ?>">
    <button class="btn btn-mc-primary" type="submit"><?php esc_html_e( 'Search', 'mountain-conqueror' ); ?></button>
</form>