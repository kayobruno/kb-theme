<?php

/**
 * Class KB_Theme_Utils
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Utils {

    /**
     * Gera o link de compartilhamento nas redes sociais
     *
     * @param string $social_network
     * @param int|null $post_id
     * @return string
     */
    public static function share(string $social_network, int $post_id = null)
    {
        if (null === $post_id) {
            global $post;
            $post_id = $post->ID;
        }

        $url = '';
        switch ($social_network) {
            case 'facebook':
                $base_url = 'https://www.facebook.com/sharer.php';
                $parameters = '?u=' . get_permalink($post_id) . '&t=' . urlencode(get_the_title($post_id));
                $url = $base_url . $parameters;
                break;
            case 'twitter':
                $url = 'https://twitter.com/intent/tweet?text=' . urlencode(get_permalink($post_id));
                break;
            case 'whatsapp':
                $url = 'https://wa.me/?text=' . get_permalink($post_id);
                break;
            case 'telegram':
                $url = 'https://t.me/share/url?url=' . get_permalink($post_id);
                break;
            case 'linkedin':
                $url = 'https://www.linkedin.com/cws/share?url=' . get_permalink($post_id);
                break;
        }

        return $url;
    }

    /**
     * Gera URL para o chat do WhatsApp
     *
     * @param string $phone_number
     * @param string|null $text
     * @return string
     */
    public static function whatsapp_chat(string $phone_number, string $text = null)
    {
        $phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        return "https://api.whatsapp.com/send?phone={$phone_number}&text={$text}";
    }

    /**
     * Gera iframe do YouTube
     *
     * @param string $url
     * @param string $classes
     * @param array $attributes
     * @return string|string[]|null
     */
    public static function youtube_iframe(string $url, string $classes = '', $attributes = array())
    {
        $attributes = implode('; ', $attributes);
        $iframe = sprintf(
            "<iframe src=\"https://www.youtube.com/embed/$2\" frameborder=\"0\" class=\"%s\" allow=\"%s\"></iframe>",
            $classes,
            $attributes
        );

        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            $iframe,
            $url
        );
    }

    /**
     * Retorna thumbnail do post, caso o mesmo não tenha thumb cadastrada a imagem de placeholder será utilizada
     *
     * @param int|null $post_id
     * @param string $size
     * @return false|mixed|string
     */
    public static function thumbnail(int $post_id = null, string $size = 'post-thumbnail')
    {
        if (null === $post_id) {
            global $post;
            $post_id = $post->ID;
        }

        $thumbnail = get_the_post_thumbnail_url($post_id, $size);
        if (!has_post_thumbnail($post_id) && function_exists('get_field')) {
            $thumbnail = get_field('placeholder', 'options');
        }

        return $thumbnail;
    }

    /**
     * Retorna os banners cadastrados no ACF
     *
     * @return array
     */
    public static function banners()
    {
        $data = array();
        if (function_exists('get_field')) {
            $banners = get_field('banners', 'banners');
            foreach ($banners as $banner) {
                $data[] = array(
                    'type' => $banner['type'],
                    'title' => $banner['title'],
                    'description' => $banner['description'],
                    'link' => $banner['link'],
                    'target' => !empty($banner['new_tab']) ? 'blank_' : '',
                    'banner' => $banner[$banner['type']],
                    'banner_mobile' => $banner['image_mobile'] ?? '',
                );
            }
        }

        return $data;
    }

    /**
     * @param string $menu
     * @return array
     */
    public static function menu(string $menu)
    {
        $locations = get_nav_menu_locations();
        if (!isset($locations[$menu])) {
            return array();
        }

        $menu_id = $locations[$menu];
        $elements = wp_get_nav_menu_items($menu_id);

        return self::build_menu($elements);
    }

    public static function renderPrice(string|float|int $price): string
    {
        $price = str_replace(',', '.', (string) $price);
        $value = number_format((float) $price, 2, ',', '');
        [$integer, $decimal] = explode(',', $value);

        return sprintf(
            '<span class="plano__preco-moeda">R$</span><span class="plano__preco-valor">%s</span><span class="plano__preco-detalhe"><span class="plano__preco-centavos">,%s</span><span class="plano__preco-mes">/ mês</span></span>',
            $integer,
            $decimal
        );
    }

    /**
     * Retorna o nome do menu atribuído a uma location
     *
     * @param string $menu
     * @return string
     */
    public static function menu_title(string $menu): string
    {
        $locations = get_nav_menu_locations();
        if (!isset($locations[$menu])) {
            return '';
        }

        $menu_object = wp_get_nav_menu_object($locations[$menu]);

        return $menu_object ? $menu_object->name : '';
    }

    /**
     * Retorna o link do chat do WhatsApp com o número cadastrado nas opções do tema
     *
     * @return string
     */
    public static function whatsapp_link(): string
    {
        $whatsapp = function_exists('get_field') ? get_field('whatsapp', 'options') : '';

        return $whatsapp ? self::whatsapp_chat($whatsapp) : '#';
    }

    /**
     * Renderiza o SVG do ícone do WhatsApp usado nos botões
     *
     * @param int $size
     * @return string
     */
    public static function renderWhatsappIcon(int $size = 15): string
    {
        return sprintf(
            '<svg class="icone-whats" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 .5C5.7.5.6 5.6.6 11.9c0 2 .5 4 1.5 5.7L.5 23.5l6-1.6c1.7.9 3.6 1.4 5.5 1.4 6.3 0 11.4-5.1 11.4-11.4C23.4 5.6 18.3.5 12 .5Zm0 20.9c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-3.5 1 .9-3.5-.2-.4a9.4 9.4 0 0 1-1.4-5.1c0-5.2 4.3-9.5 9.5-9.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5Zm5.2-7.1c-.3-.1-1.7-.8-1.9-.9-.3-.1-.5-.1-.7.1-.2.3-.8.9-.9 1.1-.2.2-.3.2-.6.1a7.7 7.7 0 0 1-3.9-3.4c-.3-.5.3-.5.8-1.6.1-.2 0-.4 0-.5l-.9-2.1c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5 1.9.8 2.6.9 3.6.7.6-.1 1.7-.7 1.9-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3Z"/></svg>',
            $size
        );
    }

    /**
     * Renderiza os SVGs de estrelas das avaliações
     *
     * @param int $quantity
     * @param int $size
     * @return string
     */
    public static function renderStars(int $quantity, int $size = 13): string
    {
        $star = sprintf(
            '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 1.8 3.1 6.9 7.1.7-5.4 4.8 1.6 7-6.4-3.8-6.4 3.8 1.6-7L1.8 9.4l7.1-.7Z"/></svg>',
            $size
        );

        return str_repeat($star, max(0, $quantity));
    }

    public static function formatPlanList(string $html): string
    {
        return str_replace(
            ['<ul>', '<li>'],
            ['<ul class="plano__lista">', '<li class="plano__item">'],
            $html
        );
    }

    /**
     * @param array $elements
     * @param int $parent_id
     * @return array
     */
    private static function build_menu(array &$elements, int $parent_id = 0)
    {
        $data = [];
        foreach ($elements as &$element) {
            if ($element->menu_item_parent == $parent_id) {
                $children = self::build_menu($elements, $element->ID);
                if ($children) {
                    $element->children = $children;
                }

                $data[$element->ID] = $element;
                unset($element);
            }
        }

        return $data;
    }
}
