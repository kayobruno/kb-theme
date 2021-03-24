<?php

/**
 * Class KB_Theme_Api
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Api extends WP_REST_Controller {

    /**
     * @var string
     */
    protected $namespace = 'kb-theme';

    /**
     * @var string
     */
    protected $rest_base = 'v1';

    public function register_routes()
    {
        // Inserir todos os métodos que registram as rotas aqui
    }
}
