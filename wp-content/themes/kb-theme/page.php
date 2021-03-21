<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 */

get_header();
the_post();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php get_template_part('template-parts/content/content', 'page'); ?>
    </main>
</div>

<?php
get_footer();
