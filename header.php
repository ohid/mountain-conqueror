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