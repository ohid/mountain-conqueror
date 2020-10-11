<?php
/**
 * The post meta partial template file
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<p class="post-meta">
    <?php do_action('mc_start_post_meta'); ?>

    <span class="meta">
        <?php
            printf(
                '<a href="%s"><span class="meta-date">%s</span></a>',
                esc_url(get_the_permalink()),
                esc_html(get_the_time(get_option('date_format')))
            );
        ?>
    </span>

    <span class="meta">
        <?php
            $author_id = get_the_author_meta( 'ID' );
            $author_link = get_author_posts_url( $author_id );

            printf(
                '<a href="%s"><span class="meta-author">%s</span></a>', 
                $author_link,
                esc_html(get_the_author_meta('display_name'))
            );
        ?>
    </span>

    <?php
        $categories = get_the_category_list(', ', '');
        if ($categories) {
            printf('<span class="meta meta-category">%s</span>', $categories);
        }
    ?>

    <?php do_action('mc_end_post_meta'); ?>
</p>