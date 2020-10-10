<?php use MConqueror\Classes\Setup;

/**
 * The main template file for Mauntain Conqueror theme.
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

        <div class="col-md-12 col-lg-9">
            <div class="entry-content">
                <?php
                // Check if have posts
                if (have_posts()) :
                    $counter = 0;
                    echo '<div class="row row-separator">';
                    while (have_posts()) :
                        the_post();

                        if ($counter !== 0 & $counter % 2 == 0) {
                            echo '</div>';
                            echo '<div class="row row-separator">';
                        }
                        
                        get_template_part('templates/article', get_post_type());

                        // Increase the counter
                        $counter++;
                    endwhile;
                    echo '</div>';

                    // Display the posts pagination
                    Setup::postsPagination();
                else :
                    get_template_part('templates/no-posts');
                endif;
                ?>
            </div>
        </div>
        
<?php
get_footer();
