<?php 
/**
 * The main template file for Mauntain Conqueror theme.
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

        <?php
            // Include the side navigation
            get_template_part( 'templates/side', 'menu' );
        ?>

        <div class="col-md-9">
            <div class="entry-content">
                <?php
                    // Check if have posts
                    if( have_posts() ) :
                        while( have_posts() ) : the_post();
                        
                            get_template_part('templates/article', get_post_type() );

                        endwhile;

                        // Display the posts thumbnail
                        echo mconqueror_posts_navigation();

                    else:
                        get_template_part('templates/no-posts');
                    endif;
                ?>
            </div>
        </div>

<?php 
get_footer();