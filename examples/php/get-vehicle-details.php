<?php
require __DIR__ . '/ApibaraClient.php';

$client = new ApibaraClient(getenv('APIBARA_API_KEY'));
$vinOrLot = $argv[1] ?? 'WBAVL1C58FVY28848';

$data = $client->get('/vehicles/' . rawurlencode($vinOrLot));

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
