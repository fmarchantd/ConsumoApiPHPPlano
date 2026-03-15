<?php

use Francisco\ApiClima\ServicioClima;

require_once __DIR__ . '/vendor/autoload.php';

$ciudad = $argv[1];
$servicio = new ServicioClima();

$datos = $servicio->obtenerClima($ciudad);

print_r($datos);