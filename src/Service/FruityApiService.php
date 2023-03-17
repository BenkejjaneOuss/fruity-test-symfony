<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class FruityApiService
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getAllFruits(): array
    {           
        $response = $this->httpClient->request(
            'GET',
            'https://fruityvice.com/api/fruit/all'
        );

        return $response->toArray();
    }
}
