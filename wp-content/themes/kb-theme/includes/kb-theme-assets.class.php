<?php

class KB_Theme_Assets {

    public function enqueue_assets()
    {
        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    private function enqueue_styles()
    {
        $src = get_template_directory_uri() . '/assets/css/app.min.css';
        wp_enqueue_style('main', $src, array(), '1.0', 'all');
    }

    private function enqueue_scripts()
    {
        $scripts = array(
            array(
                'handle' => 'main',
                'src' => get_template_directory_uri() . '/assets/js/app.min.js',
                'dependencies' => array('jquery'),
                'version' => '1.0',
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
