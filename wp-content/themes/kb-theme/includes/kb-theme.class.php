<?php

class KB_Theme {

    /**
     * @var KB_Theme_Loader
     */
    protected $loader;

    /**
     * @var array
     */
    protected $actions = array();

    /**
     * @var array
     */
    protected $filters = array();

    /**
     * KB_Theme constructor.
     * @param KB_Theme_Loader $loader
     */
    public function __construct(KB_Theme_Loader $loader)
    {
        $this->loader = $loader;
        $this->load_required_classes();
        $this->init_theme();
    }

    /**
     * Register all the actions and filters in WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * Inicializa todas as configurações
     */
    private function init_theme()
    {
        $this->define_assets();
        $this->define_post_types();
        $this->define_taxonomies();
        $this->define_setup();
        $this->define_actions();
        $this->define_filters();
    }

    /**
     * Carrega todas as classes necessárias
     */
    private function load_required_classes()
    {
        $required_classes = array(
            "includes/kb-theme-loader.class.php",
            "includes/kb-theme-assets.class.php",
            "includes/kb-theme-post-type.class.php",
            "includes/kb-theme-taxonomy.class.php",
            "includes/kb-theme-setup.class.php",
        );

        array_walk($required_classes, array($this, 'load_file'));
    }

    /**
     * This method load the class file.
     *
     * @param string $file_path Path of the file.
     */
    private function load_file(string $file_path)
    {
        $glob = glob($this->get_path() . $file_path, GLOB_BRACE);
        array_walk(
            $glob,
            function ($file) {
                file_exists($file) ? require_once($file) : die();
            }
        );
    }

    /**
     * Retorna o caminho deste arquivo
     *
     * @return String
     */
    private function get_path()
    {
        return (string) plugin_dir_path(dirname(__FILE__));
    }

    /**
     * @param array $actions
     */
    private function set_actions(array $actions)
    {
        foreach ($actions as $action) {
            $this->actions[] = $action;
        }
    }

    /**
     * @param array $filters
     */
    private function set_filters(array $filters)
    {
        foreach ($filters as $filter) {
            $this->filters[] = $filter;
        }
    }

    /**
     * Registra todas as actions no WordPress
     */
    private function define_actions()
    {
        array_walk(
            $this->actions,
            function ($component, $hook) {
                if (!isset($component['component'])) {
                    $component['component'] = null;
                }

                $this->loader->add_action(
                    $component['hook'],
                    $component['component'],
                    $component['callback']
                );
            }
        );
    }

    /**
     * Registra todos os filters no WordPress
     */
    private function define_filters()
    {
        array_walk(
            $this->filters,
            function ($component) {
                if (!isset($component['component'])) {
                    $component['component'] = null;
                }

                $this->loader->add_filter(
                    $component['hook'],
                    $component['component'],
                    $component['callback']
                );
            }
        );
    }

    /**
     * Configura todos os assets
     */
    private function define_assets()
    {
        $actions = array(
            array(
                'hook' => 'wp_enqueue_scripts',
                'component' => new KB_Theme_Assets(),
                'callback'  => 'enqueue_assets',
            ),
        );

        $this->set_actions($actions);
    }

    /**
     * Registra os custom post_types
     */
    private function define_post_types()
    {
        $actions = array();

        $this->set_actions($actions);
    }

    /**
     * Registra as taxonomies
     */
    private function define_taxonomies()
    {
        $actions = array();

        $this->set_actions($actions);
    }

    /**
     * Registra as configurações básicas
     */
    private function define_setup()
    {
        $actions = array(
            array(
                'hook' => 'after_setup_theme',
                'component' => new KB_Theme_Setup(),
                'callback' => 'theme_setup',
            ),
            array(
                'hook' => 'manage_posts_custom_column',
                'component' => new KB_Theme_Setup(),
                'callback' => 'show_thumbnail_in_list',
            ),
        );

        $filters = array(
            array(
                'hook' => 'manage_posts_columns',
                'component' => new KB_Theme_Setup(),
                'callback'  => 'config_thumbnail_in_list',
            ),
        );

        $this->set_actions($actions);
        $this->set_filters($filters);
    }
}
