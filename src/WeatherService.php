<?php

namespace Francisco\ApiClima;

use GuzzleHttp\Client;

class WeatherService
{
    private Client $client;

    public function __construct
    (
        private string $apiKey = '7bd01adfd2f787538ae02b249b53b18f',
        private string $apiUrl = 'https://api.openweathermap.org/data/2.5/weather',
    )
    {
        $this->client = new Client([
            'verify' => false
        ]);
    }

    public function getWeather(string $city): array 
    {
        $response = $this->client->get($this->apiUrl,[
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'es',
            ]
        ]);

        $weatherData = json_decode($response->getBody()->getContents(), true);
        //print_r($weatherData); die;

        return [
            'city' => $weatherData['name'],
            'country' => $weatherData['sys']['country'],
            'temperature' => $weatherData['main']['temp'],
            'description' => $weatherData['weather'][0]['description'],
            'humidity' => $weatherData['main']['humidity'],
        ];
    }
}