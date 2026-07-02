<?php

final class ApibaraClient
{
    public function __construct(
        private readonly string $apiKey,
        private readonly string $baseUrl = 'https://apibara.tech/api/v1/vehicle-auction'
    ) {}

    public function get(string $path, array $params = []): array
    {
        $query = http_build_query(array_filter($params, static fn ($value) => $value !== null && $value !== ''));
        $url = rtrim($this->baseUrl, '/') . $path . ($query ? '?' . $query : '');

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'X-API-Key: ' . $this->apiKey,
                'Accept: application/json',
            ],
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new RuntimeException('cURL error: ' . $error);
        }

        curl_close($ch);

        if ($status < 200 || $status >= 300) {
            throw new RuntimeException("Apibara API error {$status}: {$response}");
        }

        return json_decode($response, true, 512, JSON_THROW_ON_ERROR);
    }
}
