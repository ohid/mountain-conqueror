<?php
/**
 * The single event template
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<article <?php post_class(); ?>>
    <?php printf('<h2 class="event-title"><a href="%s">%s</a></h2>', esc_url(get_the_permalink()), esc_html(get_the_title())); ?>

    <div class="event-information clearfix">
        <div class="event-details">
            <?php get_template_part('templates/partials/event', 'details'); ?>
        </div>
        <div class="event-contact">
            <?php get_template_part('templates/partials/event', 'contact'); ?>
        </div>
    </div>

    <div class="event-content">
        <?php the_content(); ?>
    </div>
</article>
<?php

if (is_single()) {
    // Load the post navigation only for single post
    get_template_part('templates/partials/post', 'navigation');
}