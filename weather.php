<?php

use Francisco\ApiClima\WeatherService;

require_once __DIR__ . '/vendor/autoload.php';

$weatherService = new WeatherService();
$city = $argv['1'];
$weather = $weatherService->getWeather($city);

echo 'Ciudad: ' . $weather['city'] . ', ' . $weather['country'];
echo "\n";
echo 'Temperatura: ' . $weather['temperature'] . ' grados celsius';
echo "\n";
echo 'Descripción: ' . $weather['description'];
echo "\n";
echo 'Porcentaje de humedad: ' . $weather['humidity'] . '%';
echo "\n";
//var_dump($weather);