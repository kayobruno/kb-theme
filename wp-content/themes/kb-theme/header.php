<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title(); ?></title>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header id="masthead" class="site-header">
            <div class="site-branding"></div>
        </header>
