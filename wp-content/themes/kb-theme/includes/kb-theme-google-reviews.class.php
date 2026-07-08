<?php

/**
 * Class KB_Theme_Google_Reviews
 *
 * Sincroniza as avaliações do Google (Places API) com o banco do WordPress.
 * As avaliações são atualizadas 1x por semana via WP-Cron para evitar
 * requests ao Google a cada carregamento de página.
 *
 * @author Kayo Bruno <kayodw@gmail.com>
 */
class KB_Theme_Google_Reviews {

    const OPTION_KEY = 'kb_theme_google_reviews';
    const CRON_HOOK = 'kb_theme_google_reviews_sync';
    const API_URL = 'https://maps.googleapis.com/maps/api/place/details/json';
    const MIN_RATING = 4;
    const MAX_REVIEWS = 10;

    /**
     * Agenda a sincronização semanal
     */
    public function schedule()
    {
        if (!wp_next_scheduled(self::CRON_HOOK)) {
            wp_schedule_event(time(), 'weekly', self::CRON_HOOK);
        }
    }

    /**
     * Re-sincroniza imediatamente quando as opções do tema são salvas no admin,
     * para não precisar esperar o cron semanal após configurar a API
     *
     * @param int|string $post_id
     */
    public function sync_on_options_save($post_id)
    {
        if ('options' === $post_id) {
            $this->sync();
        }
    }

    /**
     * Busca as avaliações no Google e salva no banco as últimas com nota mínima.
     * Em caso de falha na API os dados já salvos são mantidos.
     */
    public function sync()
    {
        if (!function_exists('get_field')) {
            return;
        }

        $place_id = get_field('google_place_id', 'options');
        $api_key = get_field('google_api_key', 'options');
        if (empty($place_id) || empty($api_key)) {
            return;
        }

        $url = add_query_arg(
            array(
                'place_id' => $place_id,
                'fields' => 'rating,user_ratings_total,reviews',
                'reviews_sort' => 'newest',
                'language' => 'pt-BR',
                'key' => $api_key,
            ),
            self::API_URL
        );

        $response = wp_remote_get($url, array('timeout' => 15));
        if (is_wp_error($response)) {
            return;
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (empty($body['status']) || 'OK' !== $body['status'] || empty($body['result'])) {
            return;
        }

        $result = $body['result'];
        update_option(self::OPTION_KEY, array(
            'rating' => $result['rating'] ?? 0,
            'total' => $result['user_ratings_total'] ?? 0,
            'reviews' => $this->format_reviews($result['reviews'] ?? array()),
            'updated_at' => time(),
        ), false);
    }

    /**
     * Retorna os dados salvos no banco (nota geral, total e avaliações)
     *
     * @return array
     */
    public static function data(): array
    {
        $data = get_option(self::OPTION_KEY);

        return is_array($data) ? $data : array();
    }

    /**
     * Filtra as avaliações pela nota mínima, ordena da mais recente
     * para a mais antiga e limita a quantidade salva
     *
     * @param array $reviews
     * @return array
     */
    private function format_reviews(array $reviews): array
    {
        $reviews = array_filter($reviews, function ($review) {
            return ($review['rating'] ?? 0) >= self::MIN_RATING;
        });

        usort($reviews, function ($a, $b) {
            return ($b['time'] ?? 0) <=> ($a['time'] ?? 0);
        });

        $data = array();
        foreach (array_slice($reviews, 0, self::MAX_REVIEWS) as $review) {
            $data[] = array(
                'author' => $review['author_name'] ?? '',
                'avatar' => $review['profile_photo_url'] ?? '',
                'rating' => (int) ($review['rating'] ?? 0),
                'text' => $review['text'] ?? '',
                'date' => $review['relative_time_description'] ?? '',
                'time' => $review['time'] ?? 0,
            );
        }

        return $data;
    }
}
