<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main search-results">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php _e('Search results for:'); ?>
                    <span class="page-description"><?php echo get_search_query(); ?></span>
                </h1>
            </header>

            <?php
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content/content', get_post_type());
            }

            get_template_part('template-parts/pagination/pagination', 'list');
        else :
            get_template_part('template-parts/content/content', 'none');
        endif; ?>
    </main>
</div>

<?php
get_footer();
