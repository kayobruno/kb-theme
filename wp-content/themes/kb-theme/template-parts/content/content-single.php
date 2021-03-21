<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <figure class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
    </figure>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <?php
    if (!is_singular('attachment')) {
        get_template_part('template-parts/post/author', 'bio');
    }
    ?>
</article>
