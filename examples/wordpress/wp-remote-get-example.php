<?php

function apibara_search_vehicles_example(): array
{
    $api_key = defined('APIBARA_API_KEY') ? APIBARA_API_KEY : '';

    if (!$api_key) {
        return [];
    }

    $url = add_query_arg([
        'make' => 'Toyota',
        'model' => 'Camry',
        'year_from' => 2018,
        'lot_sub_status' => 'Open',
        'per_page' => 20,
    ], 'https://apibara.tech/api/v1/vehicle-auction/vehicles');

    $response = wp_remote_get($url, [
        'timeout' => 30,
        'headers' => [
            'X-API-Key' => $api_key,
            'Accept' => 'application/json',
        ],
    ]);

    if (is_wp_error($response)) {
        return [];
    }

    $status = wp_remote_retrieve_response_code($response);
    $body = wp_remote_retrieve_body($response);

    if ($status < 200 || $status >= 300) {
        return [];
    }

    return json_decode($body, true) ?: [];
}
