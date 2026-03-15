<?php

use Francisco\ApiClima\ProductsService;

require_once __DIR__ . '/vendor/autoload.php';

$productsService = new ProductsService();

$products = $productsService->getProducts();
//var_dump($products);
echo('Listado de Productos:' . "\n");
foreach($products as $product) {
    echo('ID: ' . $product['Product']['id'] . ', ');
    echo('Nombre: ' . $product['Product']['nombre'] . ', ');
    echo('Descripción: ' . $product['Product']['descripcion'] . ', ');
    echo('Tamaño: ' . $product['Product']['tamaño']);
    echo("\n");
}