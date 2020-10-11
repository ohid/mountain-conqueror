<?php use MConqueror\Classes\Setup;

/**
 * The article parital template that display the posts
 * Included in index.php and single.php
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?>>
    <div class="post-content">
        <h2 class="post-title">
            <?php 
                // Make the title clickable but not for single posts.
                if (is_single()) {
                    the_title();
                }  else {
                    printf(
                        '<a href="%s">%s</a>',
                        esc_url(get_the_permalink()),
                        get_the_title()
                    );
                }
            ?>
        </h2>

        <?php if (! is_single()) { ?>
            <p> <?php echo get_the_excerpt();
                    echo sprintf(
                        '<a href="%s" class="read-more">%s</a>', 
                        esc_url(get_the_permalink()),
                        __('[read more]', 'mountain-conqueror')
                    )
            ?> </p>
        <?php 

            } else {
                // Display the post content
                the_content();

                // Show pagination inside the content that uses <!--nextpage-->
                Setup::wpContentPaginated();
            }

            // Include the post meta template
            get_template_part('templates/partials/post', 'meta'); 
        ?>
    </div>
    
    <?php 
        if (! is_single() ) {
            // Do not display the post thumbnail on single page
            if (has_post_thumbnail()) {
                // Display the thumbnail with HTML markup only if there's a thumbnail
                echo '<div class="post-thumbnail">';
                    the_post_thumbnail();
                echo '</div>';
            }
        }
    ?>
</article>

<?php
    // If comments is open

    // Commenting out the comments template for now
    // Only uncomment when need to display the comments in single posts
    // comments_template();
?>

<?php 

if (is_single()) {
    // Load the post navigation only for single post
    get_template_part('templates/partials/post', 'navigation');
}