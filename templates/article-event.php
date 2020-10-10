<?php use MConqueror\Classes\Template;

/**
 * The article parital template that display the posts
 * Included in index.php and single.php
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<div class="col-md-12 col-lg-6">
    <article <?php post_class(); ?>>
        <div class="event-content">
            
            <?php Template::eventMeta(get_post()); ?>

            <?php printf('<h2 class="event-title"><a href="%s">%s</a></h2>', esc_url(get_the_permalink()), esc_html(get_the_title())); ?>

            <p> <?php echo get_the_excerpt();
                    echo sprintf(
                        '<a href="%s" class="read-more">%s</a>', 
                        esc_url(get_the_permalink()),
                        __('[read more]', 'mountain-conqueror')
                    )
            ?> </p>
        </div>
    </article>
</div>

<?php 

if (is_single()) {
    // Load the post navigation only for single post
    get_template_part('templates/partials/post', 'navigation');
}