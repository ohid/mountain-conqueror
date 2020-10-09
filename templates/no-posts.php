<?php
/**
 * The template will display a not found content
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="posts-no-found">
    <h2><?php esc_html_e('Nothing Found', 'marvelous-theme'); ?></h2>    
    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'marvelous-theme'); ?></p>

    <?php
        get_search_form();
    ?>
</div>