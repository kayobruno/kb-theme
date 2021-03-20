<?php

/**
 * Class KB_Theme_Post_Type
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Post_Type {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $singular_label;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $rewrite;

    /**
     * @var array
     */
    protected $supports;

    /**
     * @var string
     */
    protected $menu_icon;

    /**
     * KB_Theme_Post_Type constructor.
     * @param string $name
     * @param string $singular_label
     * @param string $slug
     * @param string $rewrite
     * @param string|null $menu_icon
     * @param array $supports
     */
    public function __construct(
        string $name,
        string $singular_label,
        string $slug,
        string $rewrite,
        string $menu_icon = null,
        array $supports = array()
    ) {
        $this->name = $name;
        $this->singular_label = $singular_label;
        $this->slug = $slug;
        $this->rewrite = $rewrite;
        $this->menu_icon = $menu_icon;
        $this->supports = !empty($supports) ? $supports : $this->get_default_supports();
    }

    public function register_custom_post_type()
    {
        register_post_type($this->slug, array(
            'labels' => $this->get_labels(),
            'menu_icon' => $this->menu_icon,
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => $this->rewrite),
            'supports' => $this->get_default_supports(),
        ));
    }

    /**
     * @return array
     */
    private function get_labels()
    {
        return array(
            'name' => __($this->name),
            'singular_label' => __($this->singular_label),
            'menu_name' => __($this->name),
            'parent_item_colon' => __('Parent'),
            'all_items' => __('Listar'),
            'view_item' => __('Visualizar'),
            'add_new_item' => __('Adicionar'),
            'add_new' => __('Adicionar'),
            'edit_item' => __('Editar'),
            'update_item' => __('Atualizar'),
            'search_items' => __('Pesquisar'),
            'not_found' => __('Registro não encontrado'),
            'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        );
    }

    /**
     * @return string[]
     */
    private function get_default_supports()
    {
        return array(
            'title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions', 'comments',
        );
    }
}
