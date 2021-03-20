<?php

global $post;

if (is_single()) : ?>
    <meta name="title" content="<?php echo get_the_title($post->ID); ?>" />
    <meta name="description" content="<?php echo get_the_excerpt($post->ID); ?>" />
    <?php if (has_post_thumbnail($post->ID)) : ?>
        <link rel="image_src" href="<?php echo get_the_post_thumbnail_url($post->ID); ?>" />
    <?php endif;
endif;
