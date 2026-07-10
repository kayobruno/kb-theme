<?php

/**
 * Class KB_Theme_Assets
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Assets {

    public function enqueue_assets()
    {
        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    private function enqueue_styles()
    {
        $path = get_template_directory() . '/assets/css/main.css';
        $src = get_template_directory_uri() . '/assets/css/main.css';
        // Versão pelo mtime do arquivo: cache-busting automático a cada alteração
        $version = file_exists($path) ? filemtime($path) : '1.0';
        wp_enqueue_style('main', $src, array(), $version, 'all');
    }

    private function enqueue_scripts()
    {
        $js_path = get_template_directory() . '/assets/js/main.js';
        $scripts = array(
            array(
                'handle' => 'main',
                'src' => get_template_directory_uri() . '/assets/js/main.js',
                'dependencies' => array('jquery'),
                'version' => file_exists($js_path) ? filemtime($js_path) : '1.0',
                'in_footer' => true,
            ),
        );

        array_walk($scripts, function ($script) {
            wp_enqueue_script(
                $script['handle'],
                $script['src'],
                $script['dependencies'],
                $script['version'],
                $script['in_footer']
            );
        });
    }
}
