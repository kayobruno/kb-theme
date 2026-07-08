<?php

/**
 * Template name: Página Inicial
 */

get_header();
the_post();
?>

<!-- ============================= HEADER ============================= -->
<header class="header">
    <div class="container header__inner">

        <a href="#" class="header__logo" aria-label="Vexnet Telecom — página inicial">
            <img src="assets/logo-header.png" alt="Vexnet Telecom" width="124" height="62">
        </a>

        <button class="header__toggle" type="button" aria-label="Abrir menu" aria-expanded="false" aria-controls="menu-principal">
            <span></span><span></span><span></span>
        </button>

        <nav class="header__nav" id="menu-principal" aria-label="Menu principal">
            <ul class="header__menu">
                <li class="header__menu-item">
                    <a href="#" class="header__menu-link">
                        Área do cliente
                        <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </li>
                <li class="header__menu-item"><a href="#planos" class="header__menu-link">Serviços</a></li>
                <li class="header__menu-item"><a href="#atendimento" class="header__menu-link">2ª via do cliente</a></li>
            </ul>

            <div class="header__acoes">
                <a href="#" class="botao botao--pill header__assine">
                    <svg class="icone-whats" width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                    Assine fácil
                </a>
                <a href="#" class="header__cidade">
                    <svg class="icone-pin" width="16" height="20" viewBox="0 0 16 20" fill="none" aria-hidden="true"><path d="M8 .8A7.2 7.2 0 0 0 .8 8c0 5.4 7.2 11.2 7.2 11.2S15.2 13.4 15.2 8A7.2 7.2 0 0 0 8 .8Zm0 9.8A2.6 2.6 0 1 1 8 5.4a2.6 2.6 0 0 1 0 5.2Z" fill="#00509F"/></svg>
                    Nova Russas
                    <svg class="icone-chevron" width="14" height="9" viewBox="0 0 14 9" fill="none" aria-hidden="true"><path d="M1 1.5 7 7.5 13 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
        </nav>

    </div>
</header>

<main>

    <!-- ============================= HERO ============================= -->
    <section class="hero" aria-label="Destaques">
        <div class="carrossel hero__carrossel">
            <div class="carrossel__janela">
                <ul class="carrossel__trilho" data-carrossel="hero" data-autoplay="6000">
                    <li class="hero__slide">
                        <picture class="hero__foto-area">
                            <source media="(max-width: 1024px)" srcset="assets/hero-familia-mobile.png">
                            <img class="hero__foto" src="assets/hero-familia.png" alt="Família reunida no sofá usando internet, com a mascote da Vexnet ao fundo" width="968" height="390">
                        </picture>

                        <div class="container hero__inner">
                            <div class="hero__conteudo reveal">
                                <h1 class="hero__titulo">Aperte o play<br>para uma nova<br>experiência.</h1>
                                <p class="hero__subtitulo">Streaming by Watch,<br>o mais novo lançamento.</p>
                            </div>

                            <div class="hero__oferta reveal">
                                <div class="hero__card">
                                    <p class="hero__mega"><strong class="hero__mega-numero">500</strong><span class="hero__mega-unidade">MEGA</span></p>
                                    <hr class="hero__separador">
                                    <img class="hero__watch" src="assets/watch-white.png" alt="Streaming by Watch" width="110" height="48">
                                    <hr class="hero__separador">
                                    <p class="hero__preco">
                                        <span class="hero__preco-moeda">R$</span><span class="hero__preco-valor">74</span><span class="hero__preco-detalhe"><span class="hero__preco-centavos">,90</span><span class="hero__preco-mes">/ mês</span></span>
                                    </p>
                                </div>
                                <a href="#" class="botao botao--pill hero__botao">
                                    <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                                    Assine já
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="hero__slide">
                        <picture class="hero__foto-area">
                            <source media="(max-width: 1024px)" srcset="assets/hero-familia-mobile.png">
                            <img class="hero__foto" src="assets/hero-familia.png" alt="Família reunida no sofá usando internet, com a mascote da Vexnet ao fundo" width="968" height="390">
                        </picture>

                        <div class="container hero__inner">
                            <div class="hero__conteudo">
                                <h1 class="hero__titulo">Aperte o play<br>para uma nova<br>experiência.</h1>
                                <p class="hero__subtitulo">Streaming by Watch,<br>o mais novo lançamento.</p>
                            </div>

                            <div class="hero__oferta">
                                <div class="hero__card">
                                    <p class="hero__mega"><strong class="hero__mega-numero">500</strong><span class="hero__mega-unidade">MEGA</span></p>
                                    <hr class="hero__separador">
                                    <img class="hero__watch" src="assets/watch-white.png" alt="Streaming by Watch" width="110" height="48">
                                    <hr class="hero__separador">
                                    <p class="hero__preco">
                                        <span class="hero__preco-moeda">R$</span><span class="hero__preco-valor">74</span><span class="hero__preco-detalhe"><span class="hero__preco-centavos">,90</span><span class="hero__preco-mes">/ mês</span></span>
                                    </p>
                                </div>
                                <a href="#" class="botao botao--pill hero__botao">
                                    <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                                    Assine já
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="carrossel__pontos hero__pontos" data-carrossel-pontos="hero"></div>
        </div>
    </section>

    <!-- ============================= PLANOS ============================= -->
    <section class="planos" id="planos">
        <div class="container">
            <header class="secao-cabecalho reveal">
                <h2 class="secao-titulo"><?php the_field('titulo_planos'); ?></h2>
                <p class="secao-subtitulo"><?php the_field('descricao_planos'); ?></p>
            </header>

            <?php
                $query = new WP_Query([
                    'post_type' => 'plano',
                    'posts_per_page' => 5,
                    'orderby' => 'ID',
                    'order' => 'ASC',
                ]);
            ?>
            <div class="planos__grade rolagem-mobile">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <article class="plano <?php if (get_field('plano_destaque')): ?> plano--destaque<?php endif; ?> reveal">
                            <?php if (get_field('plano_destaque')): ?>
                                <span class="plano__selo"><?php the_field('selo_destaque'); ?></span>
                            <?php endif; ?>

                            <span class="plano__tag"><?php the_title(); ?></span>
                            <p class="plano__mega"><strong class="plano__mega-numero"><?php get_field('megas'); ?></strong><span class="plano__mega-unidade">MEGA</span></p>
                            <p class="plano__incluso">Incluso no seu plano:</p>
                            <div class="plano__streaming">
                                <img class="plano__logo" src="<?php the_field('img_beneficios'); ?>" alt="" width="112" height="41">
                            </div>
                            <hr class="plano__separador">
                            <?php echo KB_Theme_Utils::formatPlanList(get_field('beneficios')); ?>
                            <hr class="plano__separador">

                            <a href="<?php the_permalink(); ?>" class="plano__condicoes">Condições e mais detalhes</a>
                            <p class="plano__preco">
                                <?php echo KB_Theme_Utils::renderPrice(get_field('preco')); ?>
                            </p>
                            <a href="#" class="botao plano__botao">
                                <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                                Chame no Whatsapp
                            </a>
                        </article>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <hr class="planos__divisor">
        </div>
    </section>

    <!-- ==================== POR QUE ESCOLHER / BANNER ==================== -->
    <section class="escolher">
        <div class="container">
            <header class="secao-cabecalho reveal">
                <h2 class="secao-titulo">Por que escolher a Vexnet?</h2>
                <p class="secao-subtitulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
            </header>
        </div>

        <div class="escolher__banner">
            <picture>
                <source media="(max-width: 1024px)" srcset="assets/banner-nova-russas-mobile.png">
                <img class="escolher__foto" src="assets/banner-nova-russas.png" alt="Atendente da Vexnet fazendo um coração com as mãos, com a igreja matriz de Nova Russas ao fundo" width="775" height="462" loading="lazy">
            </picture>
            <div class="container escolher__inner">
                <div class="escolher__conteudo reveal">
                    <p class="escolher__kicker">Atendimento local, conexão sem fronteiras.</p>
                    <h3 class="escolher__titulo"><span class="escolher__titulo-verde">Nova Russas,</span><br>estamos aqui!</h3>
                    <p class="escolher__texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    <a href="#" class="botao escolher__botao">
                        <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                        Fale com nossa equipe
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= DIFERENCIAIS ========================= -->
    <section class="diferenciais">
        <div class="container">
            <header class="secao-cabecalho secao-cabecalho--compacto reveal">
                <h2 class="secao-titulo">Nossos Diferenciais</h2>
            </header>

            <?php
                $query = new WP_Query([
                    'post_type' => 'diferencial',
                    'posts_per_page' => 5,
                    'orderby' => 'ID',
                    'order' => 'ASC',
                ]);
            ?>
            <ul class="diferenciais__grade rolagem-mobile">
                <?php
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <li class="diferencial reveal">
                            <span class="diferencial__icone-area"><img class="diferencial__icone" src="<?php echo KB_Theme_Utils::thumbnail(null, 'thumbnail'); ?>" alt="" loading="lazy"></span>
                            <hr class="diferencial__separador">
                            <p class="diferencial__texto"><?php echo nl2br(wp_strip_all_tags(get_the_content())); ?></p>
                            <a href="<?php the_field('link'); ?>" class="diferencial__mais" aria-label="Saiba mais sobre <?php the_title_attribute(); ?>">
                                <svg width="11" height="11" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>
                            </a>
                        </li>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
    </section>

    <!-- ======================= EMPRESAS PARCEIRAS ======================= -->
    <section class="empresas">
        <div class="container">
            <h2 class="empresas__titulo reveal">A conexão escolhida por grandes empresas da região</h2>

            <div class="carrossel empresas__carrossel reveal">
                <button class="carrossel__seta carrossel__seta--anterior" type="button" data-carrossel-anterior="empresas" aria-label="Empresas anteriores">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M11.5 2.5 5 9l6.5 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <?php
                    $query = new WP_Query([
                        'post_type' => 'empresa',
                        'posts_per_page' => -1,
                        'orderby' => 'ID',
                        'order' => 'ASC',
                    ]);
                ?>
                <div class="carrossel__janela">
                    <ul class="carrossel__trilho" data-carrossel="empresas">
                        <?php
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                ?>
                                <li class="empresas__item"><a href="<?php the_field('link'); ?>" class="empresas__card"><img src="<?php echo KB_Theme_Utils::thumbnail(null, 'medium'); ?>" alt="<?php the_title_attribute(); ?>" width="134" height="76" loading="lazy"></a></li>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                </div>

                <button class="carrossel__seta carrossel__seta--proxima" type="button" data-carrossel-proxima="empresas" aria-label="Próximas empresas">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M6.5 2.5 13 9l-6.5 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- ========================== DEPOIMENTOS ========================== -->
    <?php
        $google_reviews = KB_Theme_Google_Reviews::data();
        $reviews = $google_reviews['reviews'] ?? [];
        $rating = (float) ($google_reviews['rating'] ?? 0);
    ?>
    <?php if (!empty($reviews)) : ?>
    <section class="depoimentos">
        <div class="container depoimentos__inner">

            <div class="depoimentos__conteudo reveal">
                <h2 class="depoimentos__titulo">O que falam <br>os nossos <br>clientes</h2>

                <h3 class="depoimentos__avaliacao">Avaliação do Google</h3>
                <p class="depoimentos__nota" aria-label="Nota <?php echo number_format($rating, 1, ',', ''); ?> de 5">
            <span class="estrelas" aria-hidden="true">
              <?php echo KB_Theme_Utils::renderStars((int) round($rating), 15); ?>
            </span>
                    <span class="depoimentos__nota-valor"><?php echo number_format($rating, 1, '.', ''); ?></span>
                </p>
                <p class="depoimentos__observacao">As empresas do segmento apresentam <br>avaliação média abaixo de 4 estrelas.</p>

                <a href="#" class="botao depoimentos__botao">
                    <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                    Venha ser Vexlover
                </a>
            </div>

            <div class="carrossel depoimentos__carrossel reveal">
                <button class="carrossel__seta carrossel__seta--anterior" type="button" data-carrossel-anterior="depoimentos" aria-label="Depoimentos anteriores">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M11.5 2.5 5 9l6.5 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <div class="carrossel__janela">
                    <ul class="carrossel__trilho" data-carrossel="depoimentos">
                        <?php foreach ($reviews as $review) : ?>
                            <li class="depoimento">
                                <p class="depoimento__estrelas estrelas" aria-label="<?php echo $review['rating']; ?> estrelas">
                                    <?php echo KB_Theme_Utils::renderStars($review['rating']); ?>
                                </p>
                                <span class="depoimento__avatar"<?php if (!empty($review['avatar'])) : ?> style="background: url('<?php echo esc_url($review['avatar']); ?>') center / cover no-repeat"<?php endif; ?> aria-hidden="true"></span>
                                <blockquote class="depoimento__card">
                                    <p class="depoimento__texto"><?php echo esc_html(wp_trim_words($review['text'], 25, '…')); ?></p>
                                    <hr class="depoimento__separador">
                                    <footer>
                                        <p class="depoimento__nome"><?php echo esc_html($review['author']); ?></p>
                                        <p class="depoimento__empresa"><?php echo esc_html($review['date']); ?></p>
                                    </footer>
                                </blockquote>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <button class="carrossel__seta carrossel__seta--proxima" type="button" data-carrossel-proxima="depoimentos" aria-label="Próximos depoimentos">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true"><path d="M6.5 2.5 13 9l-6.5 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>

                <div class="carrossel__pontos" data-carrossel-pontos="depoimentos"></div>
            </div>

        </div>
    </section>
    <?php endif; ?>

    <!-- ========================= VITRINE / STREAMING ========================= -->
    <section class="vitrine">
        <img class="vitrine__mascote" src="assets/streaming-mascote.png" alt="Mascote da Vexnet de pijama assistindo TV no sofá com pipoca" width="605" height="485" loading="lazy">

        <div class="container vitrine__inner">
            <header class="vitrine__cabecalho reveal">
                <p class="vitrine__kicker">Vitrine Vex</p>
                <h2 class="vitrine__titulo">Além da internet, você encontra <br>uma experiência completa.</h2>
                <p class="vitrine__subtitulo">Confira aqui as novidades que você pode e deve incluir no sem combo</p>
            </header>

            <div class="vitrine__grade rolagem-mobile">
                <article class="vitrine__card reveal">
                    <img class="vitrine__logo" src="assets/globoplay-vitrine-color.png" alt="Globoplay" width="146" height="50" loading="lazy">
                    <a href="#" class="vitrine__botao">Saiba mais <span class="vitrine__botao-mais" aria-hidden="true">+</span></a>
                </article>
                <article class="vitrine__card reveal">
                    <img class="vitrine__logo" src="assets/vextv-color.png" alt="Vextv Play Livre" width="139" height="67" loading="lazy">
                    <p class="vitrine__canais">+ de 200 canais</p>
                    <a href="#" class="vitrine__botao">Saiba mais <span class="vitrine__botao-mais" aria-hidden="true">+</span></a>
                </article>
                <article class="vitrine__card reveal">
                    <img class="vitrine__logo" src="assets/watch-color.png" alt="Streaming by Watch" width="147" height="64" loading="lazy">
                    <p class="vitrine__canais">+ de 46 canais</p>
                    <a href="#" class="vitrine__botao">Saiba mais <span class="vitrine__botao-mais" aria-hidden="true">+</span></a>
                </article>
            </div>
        </div>

        <a href="#" class="botao botao--azul vitrine__whats">
            <svg class="icone-whats" width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
            Chama no WhatsApp
        </a>
    </section>

    <!-- ========================== ATENDIMENTO ========================== -->
    <section class="atendimento" id="atendimento">
        <div class="container">
            <header class="secao-cabecalho reveal">
                <p class="atendimento__kicker">É rapidex!</p>
                <h2 class="secao-titulo">Canais de atendimento</h2>
                <p class="secao-subtitulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
            </header>

            <div class="atendimento__grade">
                <div class="atendimento__canais reveal">
                    <a href="#" class="atendimento__canal">
                        <img src="assets/icone-boleto.png" alt="" width="32" height="32" loading="lazy">
                        <span>2ª via do boleto</span>
                    </a>
                    <a href="#" class="atendimento__canal">
                        <img src="assets/icone-central.png" alt="" width="27" height="31" loading="lazy">
                        <span>Central do cliente</span>
                    </a>
                    <a href="#" class="botao atendimento__contrate">
                        <svg class="icone-whats" width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>
                        <span>Contrate já</span>
                    </a>
                </div>

                <div class="atendimento__banner reveal">
                    <span class="atendimento__tag">NOSSO APP</span>
                    <img class="atendimento__mascote" src="assets/app-mascote.png" alt="Mascote da Vexnet apresentando o aplicativo Minha Vexnet no smartphone" width="384" height="310" loading="lazy">
                    <div class="atendimento__app">
                        <h3 class="atendimento__app-titulo">Minha<br>Vexnet</h3>
                        <p class="atendimento__app-texto">Com o nosso App você resolve<br>tudo sem sair de casa.</p>
                        <div class="atendimento__lojas">
                            <a href="#" aria-label="Baixar na Google Play"><img src="assets/btn-google-play.png" alt="Disponível no Google Play" width="105" height="38" loading="lazy"></a>
                            <a href="#" aria-label="Baixar na App Store"><img src="assets/btn-app-store.png" alt="Disponível na App Store" width="106" height="38" loading="lazy"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ============================= FOOTER ============================= -->
<footer class="footer">
    <div class="container footer__inner">
        <img class="footer__logo" src="assets/logo-footer.png" alt="Vexnet Telecom" width="170" height="95" loading="lazy">

        <nav class="footer__colunas" aria-label="Links do rodapé">
            <div class="footer__coluna">
                <h4 class="footer__titulo">A Vexnet</h4>
                <ul class="footer__lista">
                    <li><a href="#" class="footer__link">Conheça a Vexnet</a></li>
                    <li><a href="#" class="footer__link">Trabalhe Conosco</a></li>
                    <li><a href="#" class="footer__link">Encontre uma loja</a></li>
                    <li><a href="#" class="footer__link">Políticas de privacidade e cookies</a></li>
                </ul>
            </div>
            <div class="footer__coluna">
                <h4 class="footer__titulo">Para você</h4>
                <ul class="footer__lista">
                    <li><a href="#" class="footer__link">Planos de internet</a></li>
                    <li><a href="#" class="footer__link">+ Conteúdos</a></li>
                    <li><a href="#" class="footer__link">2ª via do boleto</a></li>
                    <li><a href="#" class="footer__link">Autoatendimento</a></li>
                    <li><a href="#" class="footer__link">Central do assinante</a></li>
                </ul>
            </div>
            <div class="footer__coluna">
                <h4 class="footer__titulo">Para sua empresa</h4>
                <ul class="footer__lista">
                    <li><a href="#" class="footer__link">Pequenas e médias empresas</a></li>
                    <li><a href="#" class="footer__link">Grandes empresas</a></li>
                    <li><a href="#" class="footer__link">Autoatendimento</a></li>
                    <li><a href="#" class="footer__link">Central do assinante</a></li>
                </ul>
            </div>
        </nav>
    </div>
</footer>

<?php get_footer(); ?>
