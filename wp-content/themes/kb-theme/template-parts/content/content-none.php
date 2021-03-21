<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

?>

<section class="no-results not-found">
    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php _e('No results found for the search term'); ?> <b><?php echo get_search_query(); ?></b></p>
        <?php else : ?>
            <p><?php _e('No data registered'); ?></p>
        <?php endif; ?>
    </div>
</section>
