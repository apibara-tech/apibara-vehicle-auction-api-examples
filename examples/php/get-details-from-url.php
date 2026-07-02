<?php
require __DIR__ . '/ApibaraClient.php';

$client = new ApibaraClient(getenv('APIBARA_API_KEY'));

$data = $client->get('/vehicles/urltodetails', [
    'url' => 'https://www.copart.com/lot/51015256/clean-title-2014-cadillac-escalade-esv-platinum-me-windham',
]);

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
