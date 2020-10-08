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

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="side-menu">
                        <?php
                            if( function_exists('wp_nav_menu') ) {
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => 'main-menu',
                                    'fallback_cb'  => 'mconqueror_link_to_menu_editor',
                                ));
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="entry-content">
                        <?php
                            // Check if have posts
                            if( have_posts() ) :

                                while( have_posts() ) : the_post();

                                    get_template_part('templates/article' );

                                endwhile;

                                // Display the posts thumbnail
                                echo mconqueror_posts_navigation();

                            else:
                                get_template_part('templates/no-posts');
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
get_footer();