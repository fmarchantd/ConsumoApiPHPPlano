<?php

namespace Francisco\ApiClima;

use GuzzleHttp\Client;

class ServicioClima {

    private Client $client;

     public function __construct
     (
        private string $apiUrl = 'https://api.openweathermap.org/data/2.5/weather',
        private string $apiKey = '7bd01adfd2f787538ae02b249b53b18f',
     )
     {
        $this->client = new Client(['verify' => false]);
     }

     public function obtenerClima(string $ciudad): array
     {
        $response = $this->client->get($this->apiUrl, [
            'query' => ['q' => $ciudad, 'appid' => $this->apiKey, 'units' => 'metric', 'lang' => 'es']
        ]);

        $datosClima = json_decode($response->getBody()->getContents(), true);

        return [
            'descripcion' => $datosClima['weather'][0]['description'],
            'temperatura' => $datosClima['main']['temp'],
            'humedad' => $datosClima['main']['humidity'],
            'ciudad' => $datosClima['name'],
            'pais' => $datosClima['sys']['country']
        ];
     }
}