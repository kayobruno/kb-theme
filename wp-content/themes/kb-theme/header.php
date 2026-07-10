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
            $menu_items = KB_Theme_Utils::menu('main');

            // Cidades da rede (Multisite). Fora de Multisite, cai no campo city das opções.
            $cidades = KB_Theme_Utils::cities();
            $cidade_atual = '';
            foreach ($cidades as $c) {
                if ($c['atual']) {
                    $cidade_atual = $c['nome'];
                    break;
                }
            }
            if ('' === $cidade_atual) {
                $cidade_atual = function_exists('get_field') ? (string) get_field('city', 'options') : '';
            }
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
                        <?php foreach ($menu_items as $item) :
                            $tem_submenu = !empty($item->children);
                        ?>
                            <li class="header__menu-item<?php echo $tem_submenu ? ' header__menu-item--tem-submenu' : ''; ?>">
                                <a href="<?php echo esc_url($item->url); ?>" class="header__menu-link"<?php echo KB_Theme_Utils::menuLinkAttrs($item); ?><?php echo $tem_submenu ? ' aria-haspopup="true"' : ''; ?>>
                                    <?php echo esc_html($item->title); ?>
                                    <?php if ($tem_submenu) : ?>
                                        <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <?php endif; ?>
                                </a>

                                <?php if ($tem_submenu) : ?>
                                    <ul class="header__submenu">
                                        <?php foreach ($item->children as $child) :
                                            $classes = (array) $child->classes;
                                            $imagem = trim((string) $child->description);
                                            $eh_imagem = (bool) array_intersect(array('menu-imagem', 'menu-image'), $classes) && '' !== $imagem;
                                        ?>
                                            <li class="header__submenu-item<?php echo $eh_imagem ? ' header__submenu-item--imagem' : ''; ?>">
                                                <a href="<?php echo esc_url($child->url); ?>" class="header__submenu-link"<?php echo KB_Theme_Utils::menuLinkAttrs($child); ?>>
                                                    <?php if ($eh_imagem) : ?>
                                                        <img src="<?php echo esc_url($imagem); ?>" alt="<?php echo esc_attr($child->title); ?>" loading="lazy">
                                                    <?php else : ?>
                                                        <?php echo esc_html($child->title); ?>
                                                    <?php endif; ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="header__acoes">
                        <a href="<?php echo esc_url(KB_Theme_Utils::whatsapp_link()); ?>" class="botao botao--pill header__assine" target="_blank" rel="noopener noreferrer">
                            <?php echo KB_Theme_Utils::renderWhatsappIcon(14); ?>
                            Assine fácil
                        </a>
                        <?php if (count($cidades) > 1) : ?>
                            <div class="header__cidade header__cidade--menu">
                                <button type="button" class="header__cidade-atual" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icone-pin" width="16" height="20" viewBox="0 0 16 20" fill="none" aria-hidden="true"><path d="M8 .8A7.2 7.2 0 0 0 .8 8c0 5.4 7.2 11.2 7.2 11.2S15.2 13.4 15.2 8A7.2 7.2 0 0 0 8 .8Zm0 9.8A2.6 2.6 0 1 1 8 5.4a2.6 2.6 0 0 1 0 5.2Z" fill="#00509F"/></svg>
                                    <?php echo esc_html($cidade_atual); ?>
                                    <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                </button>
                                <ul class="header__submenu header__cidade-lista">
                                    <?php foreach ($cidades as $c) : ?>
                                        <li class="header__submenu-item">
                                            <a href="<?php echo esc_url($c['url']); ?>" class="header__submenu-link<?php echo $c['atual'] ? ' header__submenu-link--atual' : ''; ?>"><?php echo esc_html($c['nome']); ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php elseif ($cidade_atual) : ?>
                            <a href="#" class="header__cidade">
                                <svg class="icone-pin" width="16" height="20" viewBox="0 0 16 20" fill="none" aria-hidden="true"><path d="M8 .8A7.2 7.2 0 0 0 .8 8c0 5.4 7.2 11.2 7.2 11.2S15.2 13.4 15.2 8A7.2 7.2 0 0 0 8 .8Zm0 9.8A2.6 2.6 0 1 1 8 5.4a2.6 2.6 0 0 1 0 5.2Z" fill="#00509F"/></svg>
                                <?php echo esc_html($cidade_atual); ?>
                                <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>

            </div>
        </header>
