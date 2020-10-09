<?php 
/**
 * The article parital template that display the page
 * Included in page.php
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class(); ?>>
    <div class="post-content">
        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php the_content(); ?>

        <?php 
            // Include the post meta template
            get_template_part('templates/partials/post', 'meta'); 
        ?>
    </div>
    
    <?php 
        if (has_post_thumbnail()) {
            // Display the thumbnail with HTML markup only if there's a thumbnail
            echo '<div class="post-thumbnail">';
                the_post_thumbnail();
            echo '</div>';
        }
    ?>
</article>