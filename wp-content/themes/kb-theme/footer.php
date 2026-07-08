<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

    <?php
        $footer_logo = '';
        if (function_exists('get_field')) {
            $footer_logo = get_field('footer_logo', 'options') ?: get_field('logo', 'options');
        }
    ?>
    <footer class="footer">
        <div class="container footer__inner">
            <img class="footer__logo" src="<?php echo esc_url($footer_logo ?: get_template_directory_uri() . '/assets/logo-footer.png'); ?>" alt="<?php bloginfo('name'); ?>" width="170" height="95" loading="lazy">

            <nav class="footer__colunas" aria-label="Links do rodapé">
                <?php foreach (array('footer_1', 'footer_2', 'footer_3') as $location) : ?>
                    <?php
                        $items = KB_Theme_Utils::menu($location);
                        if (empty($items)) {
                            continue;
                        }
                    ?>
                    <div class="footer__coluna">
                        <h4 class="footer__titulo"><?php echo esc_html(KB_Theme_Utils::menu_title($location)); ?></h4>
                        <ul class="footer__lista">
                            <?php foreach ($items as $item) : ?>
                                <li><a href="<?php echo esc_url($item->url); ?>" class="footer__link"><?php echo esc_html($item->title); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </nav>
        </div>
    </footer>

    <?php wp_footer(); ?>

    </body>
</html>
