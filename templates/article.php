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
    <div class="post-thumbnail">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/post-thumbnail-1.jpg' ?> " alt="post thumbnail">
    </div>
</article>