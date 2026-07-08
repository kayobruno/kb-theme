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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <?php
            $logo = function_exists('get_field') ? get_field('logo', 'options') : '';
            $city = function_exists('get_field') ? get_field('city', 'options') : '';
            $menu_items = KB_Theme_Utils::menu('main');
        ?>
        <header class="header">
            <div class="container header__inner">

                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo" aria-label="<?php bloginfo('name'); ?> — página inicial">
                    <img src="<?php echo esc_url($logo ?: get_template_directory_uri() . '/assets/logo-header.png'); ?>" alt="<?php bloginfo('name'); ?>" width="124" height="62">
                </a>

                <button class="header__toggle" type="button" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu-principal">
                    <span></span><span></span><span></span>
                </button>

                <nav class="header__nav" id="menu-principal" aria-label="Menu principal">
                    <ul class="header__menu">
                        <?php foreach ($menu_items as $item) : ?>
                            <li class="header__menu-item">
                                <a href="<?php echo esc_url($item->url); ?>" class="header__menu-link">
                                    <?php echo esc_html($item->title); ?>
                                    <?php if (!empty($item->children)) : ?>
                                        <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="header__acoes">
                        <a href="<?php echo esc_url(KB_Theme_Utils::whatsapp_link()); ?>" class="botao botao--pill header__assine">
                            <?php echo KB_Theme_Utils::renderWhatsappIcon(14); ?>
                            Assine fácil
                        </a>
                        <?php if ($city) : ?>
                            <a href="#" class="header__cidade">
                                <svg class="icone-pin" width="16" height="20" viewBox="0 0 16 20" fill="none" aria-hidden="true"><path d="M8 .8A7.2 7.2 0 0 0 .8 8c0 5.4 7.2 11.2 7.2 11.2S15.2 13.4 15.2 8A7.2 7.2 0 0 0 8 .8Zm0 9.8A2.6 2.6 0 1 1 8 5.4a2.6 2.6 0 0 1 0 5.2Z" fill="#00509F"/></svg>
                                <?php echo esc_html($city); ?>
                                <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>

            </div>
        </header>
