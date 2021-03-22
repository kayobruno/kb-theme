<?php

/**
 * Class KB_Theme_Rest_Integration
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Rest_Integration {

    /**
     * @var string
     */
    private $base_uri;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var array
     */
    private $headers;

    /**
     * KB_Theme_Rest_Integration constructor.
     * @param string $base_uri
     * @param int $timeout
     */
    public function __construct(string $base_uri, int $timeout = 100)
    {
        $this->base_uri = $base_uri;
        $this->timeout = $timeout;
        $this->headers = array(
            'Content-Type' => 'application/json',
        );
    }

    /**
     * @param string $route
     * @param string $method
     * @param array|null $params
     * @return mixed
     */
    public function proxy(string $route, string $method = 'GET', array $params = null)
    {
        $url = $this->base_uri . "/{$route}";
        $args = array(
            'headers' => $this->headers,
            'method' => $method,
            'data_format' => 'body',
            'timeout' => $this->timeout,
            'sslverify' => false,
        );

        if (null !== $params) {
            $args['body'] = json_encode($params);
        }

        $response = wp_remote_request($url, $args);
        if (is_wp_error($response)) {
            return array('errors' => ['Oops, parece que algo deu errado. Por favor entre em contato com o suporte']);
        }

        return $this->format_response($response);
    }

    /**
     * @param array $response
     * @return mixed
     */
    private function format_response(array $response)
    {
        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}
