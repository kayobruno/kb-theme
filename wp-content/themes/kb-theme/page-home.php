<?php

/**
 * Template name: Página Inicial
 */

get_header();
the_post();

$whatsapp_link = KB_Theme_Utils::whatsapp_link();
$assets = get_template_directory_uri() . '/assets';
?>

<main>

    <!-- ============================= HERO ============================= -->
    <?php
        $banners = KB_Theme_Utils::banners();
        $destaque_query = new WP_Query([
            'post_type' => 'plano',
            'posts_per_page' => 1,
            'meta_key' => 'plano_destaque',
            'meta_value' => '1',
        ]);
        $plano_destaque = $destaque_query->posts[0] ?? null;
    ?>
    <?php if (!empty($banners)) : ?>
    <section class="hero" aria-label="Destaques">
        <div class="carrossel hero__carrossel">
            <div class="carrossel__janela">
                <ul class="carrossel__trilho" data-carrossel="hero" data-autoplay="6000">
                    <?php foreach ($banners as $banner) : ?>
                        <?php if ('image' !== $banner['type']) continue; ?>
                        <li class="hero__slide">
                            <picture class="hero__foto-area">
                                <source media="(max-width: 1024px)" srcset="<?php echo esc_url($banner['banner_mobile'] ?: $banner['banner']); ?>">
                                <img class="hero__foto" src="<?php echo esc_url($banner['banner']); ?>" alt="" width="968" height="390">
                            </picture>

                            <div class="container hero__inner">
                                <div class="hero__conteudo reveal">
                                    <h1 class="hero__titulo"><?php echo nl2br(esc_html($banner['title'])); ?></h1>
                                    <p class="hero__subtitulo"><?php echo nl2br(wp_strip_all_tags((string) $banner['description'])); ?></p>
                                </div>

                                <?php if ($plano_destaque) : ?>
                                    <div class="hero__oferta reveal">
                                        <div class="hero__card">
                                            <p class="hero__mega"><strong class="hero__mega-numero"><?php echo esc_html((string) get_field('megas', $plano_destaque->ID)); ?></strong><span class="hero__mega-unidade">MEGA</span></p>
                                            <hr class="hero__separador">
                                            <img class="hero__watch" src="<?php echo esc_url((string) get_field('img_beneficios', $plano_destaque->ID)); ?>" alt="" width="110" height="48">
                                            <hr class="hero__separador">
                                            <p class="hero__preco">
                                                <?php echo KB_Theme_Utils::renderPrice((string) get_field('preco', $plano_destaque->ID)); ?>
                                            </p>
                                        </div>
                                        <a href="<?php echo esc_url($banner['link'] ?: $whatsapp_link); ?>" class="botao botao--pill hero__botao">
                                            <?php echo KB_Theme_Utils::renderWhatsappIcon(); ?>
                                            Assine já
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="carrossel__pontos hero__pontos" data-carrossel-pontos="hero"></div>
        </div>
    </section>
    <?php endif; ?>

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
                            <p class="plano__mega"><strong class="plano__mega-numero"><?php the_field('megas'); ?></strong><span class="plano__mega-unidade">MEGA</span></p>
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
                            <a href="<?php echo esc_url($whatsapp_link); ?>" class="botao plano__botao">
                                <?php echo KB_Theme_Utils::renderWhatsappIcon(); ?>
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
                <h2 class="secao-titulo"><?php the_field('escolher_titulo'); ?></h2>
                <p class="secao-subtitulo"><?php echo nl2br(esc_html((string) get_field('escolher_subtitulo'))); ?></p>
            </header>
        </div>

        <?php
            $escolher_imagem = get_field('escolher_imagem') ?: $assets . '/banner-nova-russas.png';
            $escolher_imagem_mobile = get_field('escolher_imagem_mobile') ?: (get_field('escolher_imagem') ?: $assets . '/banner-nova-russas-mobile.png');
        ?>
        <div class="escolher__banner">
            <picture>
                <source media="(max-width: 1024px)" srcset="<?php echo esc_url($escolher_imagem_mobile); ?>">
                <img class="escolher__foto" src="<?php echo esc_url($escolher_imagem); ?>" alt="" width="775" height="462" loading="lazy">
            </picture>
            <div class="container escolher__inner">
                <div class="escolher__conteudo reveal">
                    <p class="escolher__kicker"><?php the_field('escolher_kicker'); ?></p>
                    <h3 class="escolher__titulo"><span class="escolher__titulo-verde"><?php the_field('escolher_titulo_destaque'); ?></span><br><?php the_field('escolher_titulo_banner'); ?></h3>
                    <p class="escolher__texto"><?php echo nl2br(esc_html((string) get_field('escolher_texto'))); ?></p>
                    <a href="<?php echo esc_url($whatsapp_link); ?>" class="botao escolher__botao">
                        <?php echo KB_Theme_Utils::renderWhatsappIcon(); ?>
                        <?php the_field('escolher_botao_texto'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= DIFERENCIAIS ========================= -->
    <section class="diferenciais">
        <div class="container">
            <header class="secao-cabecalho secao-cabecalho--compacto reveal">
                <h2 class="secao-titulo"><?php the_field('diferenciais_titulo'); ?></h2>
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
            <h2 class="empresas__titulo reveal"><?php the_field('empresas_titulo'); ?></h2>

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
                <h2 class="depoimentos__titulo"><?php echo nl2br(esc_html((string) get_field('depoimentos_titulo'))); ?></h2>

                <h3 class="depoimentos__avaliacao">Avaliação do Google</h3>
                <p class="depoimentos__nota" aria-label="Nota <?php echo number_format($rating, 1, ',', ''); ?> de 5">
            <span class="estrelas" aria-hidden="true">
              <?php echo KB_Theme_Utils::renderStars((int) round($rating), 15); ?>
            </span>
                    <span class="depoimentos__nota-valor"><?php echo number_format($rating, 1, '.', ''); ?></span>
                </p>
                <p class="depoimentos__observacao"><?php echo nl2br(esc_html((string) get_field('depoimentos_observacao'))); ?></p>

                <a href="<?php echo esc_url($whatsapp_link); ?>" class="botao depoimentos__botao">
                    <?php echo KB_Theme_Utils::renderWhatsappIcon(); ?>
                    <?php the_field('depoimentos_botao_texto'); ?>
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
        <img class="vitrine__mascote" src="<?php echo esc_url(get_field('vitrine_mascote') ?: $assets . '/streaming-mascote.png'); ?>" alt="" width="605" height="485" loading="lazy">

        <div class="container vitrine__inner">
            <header class="vitrine__cabecalho reveal">
                <p class="vitrine__kicker"><?php the_field('vitrine_kicker'); ?></p>
                <h2 class="vitrine__titulo"><?php echo nl2br(esc_html((string) get_field('vitrine_titulo'))); ?></h2>
                <p class="vitrine__subtitulo"><?php the_field('vitrine_subtitulo'); ?></p>
            </header>

            <?php $vitrine_cards = get_field('vitrine_cards') ?: []; ?>
            <?php if (!empty($vitrine_cards)) : ?>
                <div class="vitrine__grade rolagem-mobile">
                    <?php foreach ($vitrine_cards as $card) : ?>
                        <article class="vitrine__card reveal">
                            <img class="vitrine__logo" src="<?php echo esc_url($card['logo']); ?>" alt="" loading="lazy">
                            <?php if (!empty($card['canais'])) : ?>
                                <p class="vitrine__canais"><?php echo esc_html($card['canais']); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($card['link']); ?>" class="vitrine__botao">Saiba mais <span class="vitrine__botao-mais" aria-hidden="true">+</span></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <a href="<?php echo esc_url($whatsapp_link); ?>" class="botao botao--azul vitrine__whats">
            <?php echo KB_Theme_Utils::renderWhatsappIcon(); ?>
            Chama no WhatsApp
        </a>
    </section>

    <!-- ========================== ATENDIMENTO ========================== -->
    <section class="atendimento" id="atendimento">
        <div class="container">
            <header class="secao-cabecalho reveal">
                <p class="atendimento__kicker"><?php the_field('atendimento_kicker'); ?></p>
                <h2 class="secao-titulo"><?php the_field('atendimento_titulo'); ?></h2>
                <p class="secao-subtitulo"><?php echo nl2br(esc_html((string) get_field('atendimento_subtitulo'))); ?></p>
            </header>

            <div class="atendimento__grade">
                <div class="atendimento__canais reveal">
                    <?php foreach (get_field('atendimento_canais') ?: [] as $canal) : ?>
                        <a href="<?php echo esc_url($canal['link']); ?>" class="atendimento__canal">
                            <img src="<?php echo esc_url($canal['icone']); ?>" alt="" loading="lazy">
                            <span><?php echo esc_html($canal['texto']); ?></span>
                        </a>
                    <?php endforeach; ?>
                    <a href="<?php echo esc_url($whatsapp_link); ?>" class="botao atendimento__contrate">
                        <?php echo KB_Theme_Utils::renderWhatsappIcon(22); ?>
                        <span>Contrate já</span>
                    </a>
                </div>

                <div class="atendimento__banner reveal">
                    <span class="atendimento__tag"><?php the_field('app_tag'); ?></span>
                    <img class="atendimento__mascote" src="<?php echo esc_url(get_field('app_imagem') ?: $assets . '/app-mascote.png'); ?>" alt="" width="384" height="310" loading="lazy">
                    <div class="atendimento__app">
                        <h3 class="atendimento__app-titulo"><?php echo nl2br(esc_html((string) get_field('app_titulo'))); ?></h3>
                        <p class="atendimento__app-texto"><?php echo nl2br(esc_html((string) get_field('app_texto'))); ?></p>
                        <div class="atendimento__lojas">
                            <?php if ($google_play = get_field('app_google_play')) : ?>
                                <a href="<?php echo esc_url($google_play); ?>" aria-label="Baixar na Google Play"><img src="<?php echo esc_url($assets . '/btn-google-play.png'); ?>" alt="Disponível no Google Play" width="105" height="38" loading="lazy"></a>
                            <?php endif; ?>
                            <?php if ($app_store = get_field('app_app_store')) : ?>
                                <a href="<?php echo esc_url($app_store); ?>" aria-label="Baixar na App Store"><img src="<?php echo esc_url($assets . '/btn-app-store.png'); ?>" alt="Disponível na App Store" width="106" height="38" loading="lazy"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
