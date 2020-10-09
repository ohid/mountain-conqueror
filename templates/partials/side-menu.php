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