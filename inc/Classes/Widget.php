<?php declare(strict_types=1);

namespace MConqueror\Classes;

class Widget
{
    public function register()
    {
        add_action('widgets_init', [$this, 'registerWidget']);
    }

    /**
     * Register the blog sidebar widget
     *
     * @return void
     */
    public function registerWidget()
    {
        register_sidebar([
            'id'            => 'mconqueror_sidebar',
            'name'          => esc_html__('Blog Sidebar', 'mountain-conqueror'),
            'description'   => esc_html__('Add your widgets here to show on blog sidebar', 'mountain-conqueror'),
            'class'         => '',
            'before_widget' => '<div class="widget single-sidebar post-block %2$s ">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="sidebar-title">',
            'after_title'   => '</h2>',
        ]);
    }
}
