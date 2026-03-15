<?php

use Francisco\ApiClima\UserService;

require_once __DIR__ . '/vendor/autoload.php';

$service = new UserService();

$data = $service->getUser();

if($data['genero'] === 'female') {
    $data['genero'] = 'Femenino';
} else {
    $data['genero'] = 'Masculino';
}

echo 'Obteniendo usuario...' . "\n";
echo 'Nombre: ' . $data['nombre'] . ' ' . $data['apellido'] . "\n";
echo 'Género: ' . $data['genero'] . "\n";
echo 'Email: ' . $data['email'] . "\n";
echo 'Ciudad: ' . $data['ciudad'] . ', ' . $data['pais'];