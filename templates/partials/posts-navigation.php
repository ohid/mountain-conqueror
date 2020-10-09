<?php
/**
 * Display prev and next navigation links
 * It included in templates/article.php
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="posts-navigations d-flex justify-content-between">

    <div>
        <?php
            $prev_post = get_previous_post();

            if (!empty( $prev_post )):
                printf(
                    '<a href="%s"><h4>« %s</h4></a>',
                    esc_url(get_permalink($prev_post->ID) ),
                    wp_specialchars_decode(esc_html($prev_post->post_title), ENT_QUOTES)
                );
            endif;
        ?>
    </div>

    <div>
        <?php
            $next_post = get_next_post();

            if (!empty($next_post)):
                printf(
                    '<a href="%s"><h4>%s »</h4></a>',
                    esc_url(get_permalink($next_post->ID)),
                    wp_specialchars_decode(esc_html($next_post->post_title), ENT_QUOTES)
                );
            endif;
        ?>
    </div>
</div>
