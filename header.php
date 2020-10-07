<?php 
/**
 * The footer file of Mountain Conqueror theme
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="top">

    <!-- Start <div class="site-wrapper"> -->
    <div class="site-wrapper">
        
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <?php
                                printf(
                                    '<a href="%s"><img src="%s" alt="%s"></a>',
                                    esc_url(home_url('/')),
                                    get_template_directory_uri() . '/assets/img/logo.png',
                                    get_bloginfo('title')
                                );
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="site-tagline">
                            <h1><?php echo esc_html(get_bloginfo('description')); ?></h1>

                            <h3><?php echo esc_html(get_bloginfo('title')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </header>