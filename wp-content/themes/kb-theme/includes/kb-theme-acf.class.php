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
                                'key' => 'banner_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'banner_description',
                                'label' => 'Descrição',
                                'name' => 'description',
                                'type' => 'wysiwyg',
                                'tabs' => 'all',
                                'toolbar' => 'full',
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
                                'label' => 'Imagem',
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
