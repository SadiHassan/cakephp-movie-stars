<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;
use Exception;

class TmdbController extends AppController
{
    /**
     * Search for people from TMDb based on a query.
     **/
    public function search(): void
    {
        $results = [];
        $pagination = [
            'page' => 1,
            'total_pages' => 1,
            'total_results' => 0,
        ];

        if (!$this->request->is('get')) {
            $this->set(compact('results', 'pagination'));

            return null;
        }

        $query = $this->request->getQuery('query');
        $page = max((int)$this->request->getQuery('page', 1), 1);

        if (empty($query)) {
            $this->set(compact('results', 'pagination'));

            return null;
        }

        try {
            $http = new Client();
            $url = env('TMDB_BASE_URL') . '?query=' . urlencode($query) . '&page=' . $page;

            $response = $http->get(
                $url,
                [],
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . env('TMDB_BEARER_TOKEN'),
                        'Accept' => 'application/json',
                    ],
                ],
            );

            if ($response->isOk()) {
                $data = $response->getJson();
                $results = $data['results'] ?? [];

                $pagination = [
                    'page' => $data['page'] ?? 1,
                    'total_pages' => $data['total_pages'] ?? 1,
                    'total_results' => $data['total_results'] ?? 0,
                ];
            } else {
                $this->Flash->error('API error: could not fetch data.');
                $this->log('TMDB API Error: ' . $response->getStringBody(), 'error');
            }
        } catch (Exception $e) {
            $this->Flash->error('Unexpected error occurred while calling TMDB.');
            $this->log('TMDB API Exception: ' . $e->getMessage(), 'error');
        }

        $this->set(compact('results', 'pagination', 'query'));
    }
}
