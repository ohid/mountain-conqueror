<article <?php post_class(); ?>>
    <div class="post-content">
        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php if (! is_single()) { ?>
            <p> <?php echo get_the_excerpt();
                    echo sprintf(
                        '<a href="%s">%s</a>', 
                        esc_url(get_the_permalink()),
                        __(' [read more]', 'mountain-conqueror')
                    )
            ?> </p>
        <?php 

            } else {
                the_content();
            }

            // Include the post meta template
            get_template_part('templates/post', 'meta'); 
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