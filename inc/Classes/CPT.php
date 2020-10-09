<?php declare(strict_types=1);

namespace MConqueror\Classes;

class CPT
{
    public function register()
    {
        add_action('init', [$this, 'registerCustomPostType']);
    }

    public function registerCustomPostType()
    {
        $labels = array(
            'name'                  => _x( 'Events', 'Post type general name', 'mountain-conqueror' ),
            'singular_name'         => _x( 'Event', 'Post type singular name', 'mountain-conqueror' ),
            'menu_name'             => _x( 'Events', 'Admin Menu text', 'mountain-conqueror' ),
            'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'mountain-conqueror' ),
            'add_new'               => __( 'Add New', 'mountain-conqueror' ),
            'add_new_item'          => __( 'Add New event', 'mountain-conqueror' ),
            'new_item'              => __( 'New event', 'mountain-conqueror' ),
            'edit_item'             => __( 'Edit event', 'mountain-conqueror' ),
            'view_item'             => __( 'View event', 'mountain-conqueror' ),
            'all_items'             => __( 'All events', 'mountain-conqueror' ),
            'search_items'          => __( 'Search events', 'mountain-conqueror' ),
            'parent_item_colon'     => __( 'Parent events:', 'mountain-conqueror' ),
            'not_found'             => __( 'No events found.', 'mountain-conqueror' ),
            'not_found_in_trash'    => __( 'No events found in Trash.', 'mountain-conqueror' ),
            'featured_image'        => _x( 'Event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'mountain-conqueror' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'mountain-conqueror' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'mountain-conqueror' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'mountain-conqueror' ),
            'archives'              => _x( 'Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'mountain-conqueror' ),
            'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'mountain-conqueror' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'mountain-conqueror' ),
            'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'mountain-conqueror' ),
            'items_list_navigation' => _x( 'Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'mountain-conqueror' ),
            'items_list'            => _x( 'Events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'mountain-conqueror' ),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __('Event custom post type.', 'mountain-conqueror'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'event'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
            'taxonomies'         => array('category', 'post_tag'),
            'show_in_rest'       => true
        );

        register_post_type('event', $args);
    }
}