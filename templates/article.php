<article <?php post_class(); ?>>
    <div class="post-content">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <p> <?php echo get_the_excerpt();
                
                echo sprintf(
                    '<a href="%s">%s</a>', 
                    esc_url(get_the_permalink()),
                    __(' [read more]', 'mountain-conqueror')
                )
        ?> </p>

        <?php get_template_part('templates/post', 'meta'); ?>
    </div>
    
    <?php 
        if (has_post_thumbnail()) {
            echo '<div class="post-thumbnail">';
                the_post_thumbnail();
            echo '</div>';
        }
    ?>
</article>