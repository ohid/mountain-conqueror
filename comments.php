<?php
/**
 * The template for displaying comments for Mountain Conqueror
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( post_password_required() ) {
	return;
}
?>


<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (! comments_open()  && post_type_supports(get_post_type(), 'comments')) {

        printf('<h4 class="no-comments">%s</h4>', esc_html__('Comments are turned off', 'mountain-conqueror'));
?>

<?php } else {  ?>
	<div class="reply-section">
        <div class="comments-form-area">
            <?php
                comment_form( array(
                    'title_reply_before' => '<h3 id="reply-title" class="reply-block-title">',
                    'title_reply_after'  => '</h3>',
                ) );
            ?>
        </div>
    </div>

<?php } ?>

	<?php if( have_comments() ) : ?>
		<div class="comments-section">
            <div id="comments" class="comments">
                <h3 class="reply-block-title">
                    <?php
                        $comments_number = get_comments_number();
                        if ( 1 === $comments_number ) {
                            /* translators: %s: post title */
                            printf( _x( 'One response on <i>&ldquo;%s&rdquo;</i>', 'comments title', 'mountain-conqueror' ), get_the_title() );
                        } else {
                            printf(
                                /* translators: 1: number of comments, 2: post title */
                                _nx(
                                    '%1$s response on this',
                                    '%1$s responses on this',
                                    $comments_number,
                                    'comments title',
                                    'mountain-conqueror'
                                ),
                                number_format_i18n( $comments_number ),
                                get_the_title()
                            );
                        }
                    ?>
                </h3>

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'       => 'ul',
                            'short_ping'  => true,
                            'avatar_size' => 42,
                            'callback'	=> 'mconqueror_comments_list'
                        ) );
                    ?>
                </ul><!-- .comment-list -->

            </div>
        </div>

	<?php endif; // check for the have comments  ?>




