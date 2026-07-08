<?php

if (!function_exists('dd')) {
    /**
     * Var_dump and die method
     *
     * @param $data
     * @return void
     */
    function dd($data)
    {
        ini_set("highlight.comment", "#969896; font-style: italic");
        ini_set("highlight.default", "#FFFFFF");
        ini_set("highlight.html", "#D16568");
        ini_set("highlight.keyword", "#7FA3BC; font-weight: bold");
        ini_set("highlight.string", "#F2C47E");

        $output = highlight_string("<?php\n\n" . var_export($data, true), true);

        echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
        die;
    }
}

/**
 * Plugins extras do ACF
 */
$acf_plugins = array(
    'plugins/acf-gallery/acf-gallery.php',
    'plugins/acf-options-page/acf-options-page.php',
    'plugins/acf-repeater/acf-repeater.php',
);

foreach ($acf_plugins as $plugin) {
    if (!$plugin_path = locate_template($plugin)) {
        error_log(sprintf(__('Error locating %s for inclusion'), $plugin), E_USER_ERROR);
    }
    include_once "{$plugin_path}";
}

spl_autoload_register(function ($class) {
    $class_name = strtolower(str_replace('_', '-', $class));
    $path = __DIR__ . "/includes/{$class_name}.class.php";

    if (file_exists($path)) {
        require_once $path;
    }
});

$theme = new KB_Theme(new KB_Theme_Loader());
$theme->run();


function meu_tema_register_post_types(): void
{
    register_post_type('plano', [
        'labels' => [
            'name' => 'Planos',
            'singular_name' => 'Plano',
            'add_new' => 'Adicionar Plano',
            'add_new_item' => 'Adicionar Planos',
            'edit_item' => 'Editar Plano',
            'new_item' => 'Novo Plano',
            'view_item' => 'Ver Plano',
            'search_items' => 'Buscar Planos',
            'not_found' => 'Nenhum Plano encontrado',
        ],

        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'planos'
        ],

        'menu_icon' => 'dashicons-money-alt',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions'
        ],

        'show_in_rest' => true,
    ]);

    register_post_type('diferencial', [
        'labels' => [
            'name' => 'Diferenciais',
            'singular_name' => 'Diferencial',
            'add_new' => 'Adicionar Diferencial',
            'add_new_item' => 'Adicionar Diferenciais',
            'edit_item' => 'Editar Diferencial',
            'new_item' => 'Novo Diferencial',
            'view_item' => 'Ver Diferencial',
            'search_items' => 'Buscar Diferenciais',
            'not_found' => 'Nenhum Diferencial encontrado',
        ],

        'public' => true,
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'diferenciais'
        ],

        'menu_icon' => 'dashicons-awards',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ],

        'show_in_rest' => true,
    ]);

    register_post_type('empresa', [
        'labels' => [
            'name' => 'Empresas',
            'singular_name' => 'Empresa',
            'add_new' => 'Adicionar Empresa',
            'add_new_item' => 'Adicionar Empresas',
            'edit_item' => 'Editar Empresa',
            'new_item' => 'Nova Empresa',
            'view_item' => 'Ver Empresa',
            'search_items' => 'Buscar Empresas',
            'not_found' => 'Nenhuma Empresa encontrada',
        ],

        'public' => true,
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'empresas'
        ],

        'menu_icon' => 'dashicons-building',

        'supports' => [
            'title',
            'thumbnail',
            'revisions'
        ],

        'show_in_rest' => true,
    ]);
}

add_action('init', 'meu_tema_register_post_types');
