<?php

/**
 * Class KB_Theme_Acf
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Acf {

    public function init_acf()
    {
        $this->options_page_title();
        $this->default_options_page();
        $this->options_page_banner();
        $this->diferencial_fields();
        $this->empresa_fields();
        $this->plano_fields();
        $this->home_page_fields();
    }

    private function options_page_title()
    {
        if (function_exists('acf_set_options_page_title')) {
            acf_set_options_page_title(__('Theme Options'));
        }
    }

    private function default_options_page()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'fields_options_page',
                'title' => 'Página de opções',
                'fields' => array(
                    array(
                        'key' => 'group_midia',
                        'label' => 'Mídia',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'main_logo',
                        'label' => 'Logo Principal',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'footer_logo',
                        'label' => 'Logo do Rodapé',
                        'name' => 'footer_logo',
                        'type' => 'image',
                        'instructions' => 'A logo principal será utilizada caso esta não seja cadastrada',
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'placeholder_image',
                        'label' => 'Imagem de Placeholder',
                        'name' => 'placeholder',
                        'type' => 'image',
                        'instructions' => 'Esta imagem será utilizada quando o post não possuir uma imagem destacada',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'social_networks',
                        'label' => 'Redes Sociais',
                        'name' => 'social_networks',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key' => 'icon',
                                'label' => 'Ícone',
                                'name' => 'icon',
                                'type' => 'select',
                                'required' => 1,
                                'choices' => array(
                                    'fa-facebook-f' => 'Facebook',
                                    'fa-instagram' => 'Instagram',
                                    'fa-twitter' => 'Twitter',
                                    'fa-tiktok' => 'TikTok',
                                    'fa-youtube' => 'YouTube',
                                    'fa-linkedin' => 'Linkedin',
                                    'fa-whatsapp' => 'WhatsApp',
                                    'fa-telegram-plane' => 'Telegram',
                                ),
                                'default_value' => false,
                                'return_format' => 'value',
                            ),
                            array(
                                'key' => 'link',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'url',
                                'required' => 1,
                            ),

                            array(
                                'key' => 'image',
                                'label' => 'Imagem',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'url',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'group_contact',
                        'label' => 'Contato',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'phone',
                        'label' => 'Telefone',
                        'name' => 'phone',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'whatsapp',
                        'label' => 'WhatsApp',
                        'name' => 'whatsapp',
                        'type' => 'text',
                        'instructions' => 'Número usado em todos os botões de WhatsApp do site',
                    ),
                    array(
                        'key' => 'city',
                        'label' => 'Cidade',
                        'name' => 'city',
                        'type' => 'text',
                        'instructions' => 'Cidade exibida no topo do site',
                    ),
                    array(
                        'key' => 'email',
                        'label' => 'E-mail',
                        'name' => 'email',
                        'type' => 'email',
                    ),
                    array(
                        'key' => 'address',
                        'label' => 'Endereço',
                        'name' => 'address',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                    ),
                    array(
                        'key' => 'group_google',
                        'label' => 'Google',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'google_place_id',
                        'label' => 'Place ID',
                        'name' => 'google_place_id',
                        'type' => 'text',
                        'instructions' => 'ID do local no Google Maps, usado para buscar as avaliações da empresa',
                    ),
                    array(
                        'key' => 'google_api_key',
                        'label' => 'API Key',
                        'name' => 'google_api_key',
                        'type' => 'text',
                        'instructions' => 'Chave de API do Google Cloud com a Places API habilitada',
                    ),
                    array(
                        'key' => 'group_metrics',
                        'label' => 'Métricas',
                        'type' => 'tab',
                        'placement' => 'top',
                    ),
                    array(
                        'key' => 'analytics_code',
                        'label' => 'Analytics',
                        'name' => 'analytics_code',
                        'type' => 'text',
                        'placeholder' => 'XX-XXXXXX',
                    ),
                    array(
                        'key' => 'facebook_pixel',
                        'label' => 'Facebook Pixel',
                        'name' => 'facebook_pixel',
                        'type' => 'text',
                        'instructions' => 'Informe apenas o número',
                        'placeholder' => '00000000000000',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }

    /**
     * Registra os campos das seções da Página Inicial
     */
    private function home_page_fields()
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        acf_add_local_field_group(array(
            'key' => 'fields_home_page',
            'title' => 'Seções da Página Inicial',
            'fields' => array(
                array(
                    'key' => 'group_escolher',
                    'label' => 'Por que escolher',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'escolher_titulo',
                    'label' => 'Título da seção',
                    'name' => 'escolher_titulo',
                    'type' => 'text',
                    'default_value' => 'Por que escolher a Vexnet?',
                ),
                array(
                    'key' => 'escolher_subtitulo',
                    'label' => 'Subtítulo da seção',
                    'name' => 'escolher_subtitulo',
                    'type' => 'textarea',
                    'rows' => 3,
                    'new_lines' => '',
                ),
                array(
                    'key' => 'escolher_kicker',
                    'label' => 'Frase de apoio do banner',
                    'name' => 'escolher_kicker',
                    'type' => 'text',
                    'default_value' => 'Atendimento local, conexão sem fronteiras.',
                ),
                array(
                    'key' => 'escolher_titulo_destaque',
                    'label' => 'Título do banner (parte em verde)',
                    'name' => 'escolher_titulo_destaque',
                    'type' => 'text',
                    'default_value' => 'Nova Russas,',
                ),
                array(
                    'key' => 'escolher_titulo_banner',
                    'label' => 'Título do banner (parte em branco)',
                    'name' => 'escolher_titulo_banner',
                    'type' => 'text',
                    'default_value' => 'estamos aqui!',
                ),
                array(
                    'key' => 'escolher_texto',
                    'label' => 'Texto do banner',
                    'name' => 'escolher_texto',
                    'type' => 'textarea',
                    'rows' => 4,
                    'new_lines' => '',
                ),
                array(
                    'key' => 'escolher_botao_texto',
                    'label' => 'Texto do botão',
                    'name' => 'escolher_botao_texto',
                    'type' => 'text',
                    'default_value' => 'Fale com nossa equipe',
                ),
                array(
                    'key' => 'escolher_imagem',
                    'label' => 'Imagem Desktop',
                    'name' => 'escolher_imagem',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'escolher_imagem_mobile',
                    'label' => 'Imagem Mobile',
                    'name' => 'escolher_imagem_mobile',
                    'type' => 'image',
                    'instructions' => 'A imagem desktop será utilizada caso esta não seja cadastrada',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'group_diferenciais',
                    'label' => 'Diferenciais',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'diferenciais_titulo',
                    'label' => 'Título da seção',
                    'name' => 'diferenciais_titulo',
                    'type' => 'text',
                    'default_value' => 'Nossos Diferenciais',
                ),
                array(
                    'key' => 'group_empresas',
                    'label' => 'Empresas',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'empresas_titulo',
                    'label' => 'Título da seção',
                    'name' => 'empresas_titulo',
                    'type' => 'text',
                    'default_value' => 'A conexão escolhida por grandes empresas da região',
                ),
                array(
                    'key' => 'group_depoimentos',
                    'label' => 'Depoimentos',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'depoimentos_titulo',
                    'label' => 'Título da seção',
                    'name' => 'depoimentos_titulo',
                    'type' => 'textarea',
                    'rows' => 3,
                    'new_lines' => '',
                    'instructions' => 'Cada linha do campo vira uma linha do título',
                    'default_value' => "O que falam\nos nossos\nclientes",
                ),
                array(
                    'key' => 'depoimentos_observacao',
                    'label' => 'Observação abaixo da nota',
                    'name' => 'depoimentos_observacao',
                    'type' => 'textarea',
                    'rows' => 2,
                    'new_lines' => '',
                    'default_value' => "As empresas do segmento apresentam\navaliação média abaixo de 4 estrelas.",
                ),
                array(
                    'key' => 'depoimentos_botao_texto',
                    'label' => 'Texto do botão',
                    'name' => 'depoimentos_botao_texto',
                    'type' => 'text',
                    'default_value' => 'Venha ser Vexlover',
                ),
                array(
                    'key' => 'group_vitrine',
                    'label' => 'Vitrine',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'vitrine_kicker',
                    'label' => 'Frase de apoio',
                    'name' => 'vitrine_kicker',
                    'type' => 'text',
                    'default_value' => 'Vitrine Vex',
                ),
                array(
                    'key' => 'vitrine_titulo',
                    'label' => 'Título da seção',
                    'name' => 'vitrine_titulo',
                    'type' => 'textarea',
                    'rows' => 2,
                    'new_lines' => '',
                    'default_value' => "Além da internet, você encontra\numa experiência completa.",
                ),
                array(
                    'key' => 'vitrine_subtitulo',
                    'label' => 'Subtítulo da seção',
                    'name' => 'vitrine_subtitulo',
                    'type' => 'text',
                    'default_value' => 'Confira aqui as novidades que você pode e deve incluir no sem combo',
                ),
                array(
                    'key' => 'vitrine_mascote',
                    'label' => 'Imagem da mascote',
                    'name' => 'vitrine_mascote',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'vitrine_cards',
                    'label' => 'Cards',
                    'name' => 'vitrine_cards',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Adicionar Card',
                    'sub_fields' => array(
                        array(
                            'key' => 'vitrine_card_logo',
                            'label' => 'Logo',
                            'name' => 'logo',
                            'type' => 'image',
                            'required' => 1,
                            'return_format' => 'url',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'vitrine_card_canais',
                            'label' => 'Canais',
                            'name' => 'canais',
                            'type' => 'text',
                            'instructions' => 'Ex: + de 200 canais (opcional)',
                        ),
                        array(
                            'key' => 'vitrine_card_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'url',
                            'required' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'group_atendimento',
                    'label' => 'Atendimento',
                    'type' => 'tab',
                    'placement' => 'top',
                ),
                array(
                    'key' => 'atendimento_kicker',
                    'label' => 'Frase de apoio',
                    'name' => 'atendimento_kicker',
                    'type' => 'text',
                    'default_value' => 'É rapidex!',
                ),
                array(
                    'key' => 'atendimento_titulo',
                    'label' => 'Título da seção',
                    'name' => 'atendimento_titulo',
                    'type' => 'text',
                    'default_value' => 'Canais de atendimento',
                ),
                array(
                    'key' => 'atendimento_subtitulo',
                    'label' => 'Subtítulo da seção',
                    'name' => 'atendimento_subtitulo',
                    'type' => 'textarea',
                    'rows' => 3,
                    'new_lines' => '',
                ),
                array(
                    'key' => 'atendimento_canais',
                    'label' => 'Canais',
                    'name' => 'atendimento_canais',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Adicionar Canal',
                    'sub_fields' => array(
                        array(
                            'key' => 'atendimento_canal_icone',
                            'label' => 'Ícone',
                            'name' => 'icone',
                            'type' => 'image',
                            'required' => 1,
                            'return_format' => 'url',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'atendimento_canal_texto',
                            'label' => 'Texto',
                            'name' => 'texto',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'atendimento_canal_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'url',
                            'required' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'app_tag',
                    'label' => 'Tag do banner do App',
                    'name' => 'app_tag',
                    'type' => 'text',
                    'default_value' => 'NOSSO APP',
                ),
                array(
                    'key' => 'app_titulo',
                    'label' => 'Título do App',
                    'name' => 'app_titulo',
                    'type' => 'textarea',
                    'rows' => 2,
                    'new_lines' => '',
                    'default_value' => "Minha\nVexnet",
                ),
                array(
                    'key' => 'app_texto',
                    'label' => 'Texto do App',
                    'name' => 'app_texto',
                    'type' => 'textarea',
                    'rows' => 2,
                    'new_lines' => '',
                    'default_value' => "Com o nosso App você resolve\ntudo sem sair de casa.",
                ),
                array(
                    'key' => 'app_imagem',
                    'label' => 'Imagem da mascote',
                    'name' => 'app_imagem',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'app_google_play',
                    'label' => 'Link do Google Play',
                    'name' => 'app_google_play',
                    'type' => 'url',
                ),
                array(
                    'key' => 'app_app_store',
                    'label' => 'Link da App Store',
                    'name' => 'app_app_store',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-home.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        ));
    }

    /**
     * Registra os campos do post type Diferencial
     */
    private function diferencial_fields()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'fields_diferencial',
                'title' => 'Informações do Diferencial',
                'fields' => array(
                    array(
                        'key' => 'diferencial_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => 'URL do botão "Saiba mais" exibido no card do diferencial',
                        'required' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'diferencial',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }

    /**
     * Registra os campos do post type Empresa
     */
    private function empresa_fields()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'fields_empresa',
                'title' => 'Informações da Empresa',
                'fields' => array(
                    array(
                        'key' => 'empresa_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => 'URL de destino do card da empresa no carrossel',
                        'required' => 1,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'empresa',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }

    /**
     * Registra os campos complementares do post type Plano
     *
     * Os campos originais (megas, preco, beneficios, img_beneficios,
     * plano_destaque, selo_destaque) foram criados via painel do ACF e
     * permanecem gravados no banco. Aqui adicionamos apenas os campos novos.
     */
    private function plano_fields()
    {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'fields_plano',
                'title' => 'Informações complementares do Plano',
                'fields' => array(
                    array(
                        'key' => 'plano_galeria_beneficios',
                        'label' => 'Galeria "Incluso no plano"',
                        'name' => 'galeria_beneficios',
                        'type' => 'gallery',
                        'instructions' => 'Imagens exibidas em "Incluso no seu plano". Quando houver mais de uma, elas passam automaticamente em slide dentro do card. Se ficar vazio, é usada a imagem única do campo antigo.',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'plano_preco_oferta',
                        'label' => 'Preço de oferta',
                        'name' => 'preco_oferta',
                        'type' => 'text',
                        'instructions' => 'Opcional. Use o mesmo formato do preço normal (ex.: 79,90). Quando preenchido, o card mostra "de R$ [preço] por apenas R$ [oferta]", com a oferta em destaque.',
                    ),
                    array(
                        'key' => 'plano_cor_selo',
                        'label' => 'Cor da tag de destaque',
                        'name' => 'cor_selo',
                        'type' => 'color_picker',
                        'instructions' => 'Cor de fundo da tag de destaque (selo) exibida nos planos em destaque. Se ficar vazio, usa a cor padrão do tema.',
                    ),
                    array(
                        'key' => 'plano_condicoes',
                        'label' => 'Condições e mais detalhes',
                        'name' => 'condicoes',
                        'type' => 'wysiwyg',
                        'instructions' => 'Texto jurídico/condições exibido em um box ao clicar em "Condições e mais detalhes". Se ficar vazio, o link não aparece.',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'plano',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }

    /**
     * Registra todos os campos da página de opções dos banners
     */
    private function options_page_banner()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Banners',
                'menu_title' => 'Banners',
                'menu_slug' => 'banners',
                'capability' => 'edit_posts',
                'position' => '3.1',
                'icon_url' => 'dashicons-format-gallery',
                'redirect' => true,
                'post_id' => 'banners',
                'autoload' => false,
            ));
        }

        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'fields_options_page_banner',
                'title' => 'Informações dos Banners',
                'fields' => array(
                    array(
                        'key' => 'banners',
                        'label' => 'Banners',
                        'name' => 'banners',
                        'type' => 'repeater',
                        'required' => 1,
                        'min' => 1,
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'banner_type',
                                'label' => 'Tipo',
                                'name' => 'type',
                                'type' => 'select',
                                'required' => 1,
                                'choices' => array(
                                    'image' => 'Imagem',
                                    'video' => 'Vídeo',
                                ),
                                'return_format' => 'value',
                            ),
                            array(
                                'key' => 'banner_plano',
                                'label' => 'Plano em destaque',
                                'name' => 'plano',
                                'type' => 'post_object',
                                'instructions' => 'Opcional. Selecione um plano para exibir o card de oferta neste banner. Deixe vazio para um banner sem plano.',
                                'post_type' => array('plano'),
                                'return_format' => 'id',
                                'ui' => 1,
                                'allow_null' => 1,
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'banner_link',
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'url',
                            ),
                            array(
                                'key' => 'banner_new_tab',
                                'label' => 'Abrir em nova Aba?',
                                'name' => 'new_tab',
                                'type' => 'checkbox',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'banner_link',
                                            'operator' => '!=empty',
                                        ),
                                    ),
                                ),
                                'choices' => array(
                                    1 => 'Sim',
                                ),
                                'default_value' => array(),
                                'layout' => 'horizontal',
                                'return_format' => 'value',
                            ),
                            array(
                                'key' => 'banner_image',
                                'label' => 'Imagem Desktop',
                                'name' => 'image',
                                'type' => 'image',
                                'required' => 1,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'banner_type',
                                            'operator' => '==',
                                            'value' => 'image',
                                        ),
                                    ),
                                ),
                                'return_format' => 'url',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'banner_image_mobile',
                                'label' => 'Imagem Mobile',
                                'name' => 'image_mobile',
                                'type' => 'image',
                                'required' => 1,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'banner_type',
                                            'operator' => '==',
                                            'value' => 'image',
                                        ),
                                    ),
                                ),
                                'return_format' => 'url',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'banner_video',
                                'label' => 'Vídeo',
                                'name' => 'video',
                                'type' => 'url',
                                'required' => 1,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'banner_type',
                                            'operator' => '==',
                                            'value' => 'video',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'banners',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }
}
