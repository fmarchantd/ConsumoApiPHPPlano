<?php

namespace Francisco\ApiClima;

use GuzzleHttp\Client;

class UserService {
    private Client $client;

    public function __construct(private $apiUrl = 'https://randomuser.me/api/')
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getUser(): array
    {
        $response = $this->client->get($this->apiUrl);

        $userData = json_decode($response->getBody()->getContents(), true);

        return [
            'nombre' => $userData['results'][0]['name']['first'],
            'apellido' => $userData['results'][0]['name']['last'],
            'genero' => $userData['results'][0]['gender'],
            'pais' => $userData['results'][0]['location']['country'],
            'ciudad' => $userData['results'][0]['location']['city'],
            'email' => $userData['results'][0]['email']
        ];
    }

}