<?php declare(strict_types=1);
/**
 * Miscellaneous functions
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! function_exists('mconqueror_link_to_menu_editor')) {

    /**
     * Menu fallback. Link to the menu editor if that is useful.
     *
     * @param  array $args
     * @return string
     */
    function mconqueror_link_to_menu_editor(array $args)
    {
        if (! current_user_can('manage_options')) {
            return;
        }

        // see wp-includes/nav-menu-template.php for available arguments
        extract($args);

        $link = $link_before;

        $link .= sprintf(
            '<a href="%s" class="create-menu">%s</a>',
            esc_url(admin_url('nav-menus.php')),
            esc_attr($before) . esc_attr__('Create a menu', 'mountain-conqueror') . esc_attr($after)
        );
                
        $link .= $link_after;

        // We have a list
        if (false !== stripos($items_wrap, '<ul')
            or false !== stripos($items_wrap, '<ol')
        ) {
            $link = sprintf('<li>%s</li>', $link);
        }

        $output = sprintf($items_wrap, $menu_id, $menu_class, $link);
        if (! empty($container)) {
            $output = sprintf(
                "<%s>%s</%s>",
                esc_attr($container),
                $output,
                esc_attr($container)
            );
            // $output  = "<". esc_attr($container) ." class='". esc_attr($container_class) ."' id='". esc_attr($container_id) ."'>$output</". esc_attr($container) .">";
        }

        if ($echo) {
            echo wp_specialchars_decode(esc_html($output), ENT_QUOTES);
        }

        return $output;
    }
}


/**
 *
 * Building Comments Lists
 *
 */
function mconqueror_comments_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo esc_html( $tag ) ; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="single-comment"><?php
	} ?>
		<div class="user-small-card">
		<div class="user-img">
			<?php
				if ( $args['avatar_size'] != 0 ) {
					echo get_avatar( $comment, 50 );
				}
			?>
		</div>
		<div class="user-identity">
			<h3 class="name"><?php esc_html( comment_author() ); ?></h3>
			<p class="date"><?php echo esc_html( the_time( get_option('date_format') ) );?> <?php  esc_html( comment_time() ); ?></p>
		</div>
		</div>
		<div class="comment-text">
			<?php
				if( $comment->comment_approved  == 0 ) {
					esc_html_e('Your comment is awating for moderation.', 'mountain-conqueror');
				} else {
					comment_text();
				}
			?>
		</div>

		<div class="comment-links">
			<?php
				if( get_edit_comment_link() ) :
					esc_url( edit_comment_link( esc_html__('Edit', 'mountain-conqueror') ) );
				endif;
			?>

			<?php
				comment_reply_link( array_merge( $args, array(
					'reply_text' =>  esc_html__('Reply', 'mountain-conqueror'),
					'after' => ' <span> </span>',
					'depth' => $depth,
					'max_depth' => $args['max_depth']
				) ) );
			?>
		</div>


		<?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
}