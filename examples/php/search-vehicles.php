<?php
require __DIR__ . '/ApibaraClient.php';

$client = new ApibaraClient(getenv('APIBARA_API_KEY'));

$data = $client->get('/vehicles', [
    'make' => 'Toyota',
    'model' => 'Camry',
    'year_from' => 2018,
    'lot_sub_status' => 'Open',
    'per_page' => 20,
]);

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
