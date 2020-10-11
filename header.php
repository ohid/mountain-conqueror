<?php use MConqueror\Classes\Template;

/**
 * The header file of Mountain Conqueror theme
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="top">

    <?php do_action('mc_before_site_wrapper'); ?>

    <!-- Start <div class="site-wrapper"> -->
    <div class="site-wrapper">
        <?php do_action('mc_before_header'); ?>
        
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <div class="logo">
                            <?php Template::siteLogo();?>
                        </div>
                    </div>
                    <div class="col-md-9 d-none d-lg-block">
                        <div class="site-tagline">
                            <?php Template::headerSlogan();?>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php do_action('mc_after_header'); ?>

        <!-- Beginning of <section class="main"> -->
        <section class="main">
            <?php do_action('mc_start_main'); ?>
            <div class="container">
                <div class="row">

                <?php

                if (! is_404()) {
                    // Include the side navigation
                    get_template_part('templates/partials/side', 'menu');
                }