<?php

namespace Francisco\ApiClima;

use GuzzleHttp\Client;

class ProductsService
{
    private Client $client;

    public function __construct
    (
        private string $apiUrl = 'http://localhost:8080/api/products',
    ) 
    {
        $this->client = new Client([
            'verify' => false
        ]);
    }
    public function getProducts()
    {
        $response = $this->client->get($this->apiUrl);

        $productsData = json_decode($response->getBody()->getContents(), true);

        $products = [];

        foreach ($productsData as $productData) {
            $products[] = [
                'Product' => [
                    'id' => $productData['id'],
                    'nombre' => $productData['name'],
                    'descripcion' => $productData['description'],
                    'tamaño' => $productData['size'],
                ]
            ];
        }
         return $products;
    }
}