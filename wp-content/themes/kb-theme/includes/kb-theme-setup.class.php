<?php

/**
 * Class KB_Theme_Setup
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Setup {

    public function theme_setup()
    {
        $this->default_theme_configuration();
    }

    public function config_thumbnail_in_list($columns)
    {
        $columns['custom_post_thumbs'] = __('Imagem destacada');
        return $columns;
    }

    public function show_thumbnail_in_list($column_name)
    {
        if ($column_name === 'custom_post_thumbs') {
            the_post_thumbnail('admin-thumb');
        }
    }

    public function show_meta_tags()
    {
        if (file_exists(get_template_directory() . '/partials/head/meta-tags.php')) {
            require get_template_directory() . '/partials/head/meta-tags.php';
        }
    }

    private function default_theme_configuration()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('admin-thumb', 100, 100);

        register_nav_menus(array(
            'main' => esc_html__('Principal'),
            'footer' => esc_html__('Rodapé'),
        ));

        register_sidebar(
            array(
                'name' => esc_html__('Sidebar'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Adicione aqui os widgets.'),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            )
        );
    }
}
