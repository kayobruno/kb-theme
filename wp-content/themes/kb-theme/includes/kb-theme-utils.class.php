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
                );
            }
        }

        return $data;
    }
}
