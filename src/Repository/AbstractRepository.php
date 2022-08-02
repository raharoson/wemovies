<?php

namespace App\Repository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class AbstractRepository
{
    public const HTTP_SUCCESS = 200;

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $tmdbApiBaseUrl,
        private string $tmdbApiKey,
        private string $tmdbApiVersion
    ) {}

    protected function load(string $uri, array $params = [])
    {
        $response = $this->httpClient->request('GET', $uri, [
            'query' => $params
        ]);

        if ($response->getStatusCode() !== self::HTTP_SUCCESS) {
            
        }

        return $response->getContent();
    }
}