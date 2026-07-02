<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

final class ApibaraVehicleAuctionClient
{
    private function http(): PendingRequest
    {
        return Http::baseUrl(config('services.apibara.base_url', 'https://apibara.tech/api/v1/vehicle-auction'))
            ->withHeaders([
                'X-API-Key' => config('services.apibara.key'),
                'Accept' => 'application/json',
            ])
            ->timeout(30)
            ->retry(2, 500);
    }

    public function searchVehicles(array $filters = []): array
    {
        return $this->http()->get('/vehicles', $filters)->throw()->json();
    }

    public function getVehicleDetails(string $vinOrLotNumber): array
    {
        return $this->http()->get('/vehicles/' . rawurlencode($vinOrLotNumber))->throw()->json();
    }

    public function getVehicleHistory(string $vinOrLotNumber, array $params = []): array
    {
        return $this->http()->get('/vehicles/' . rawurlencode($vinOrLotNumber) . '/history', $params)->throw()->json();
    }

    public function getRelatedVehicles(string $vinOrLotNumber): array
    {
        return $this->http()->get('/vehicles/' . rawurlencode($vinOrLotNumber) . '/related')->throw()->json();
    }

    public function getFilters(): array
    {
        return $this->http()->get('/vehicles/filters')->throw()->json();
    }

    public function getShipping(string $vinOrLotNumber, string $ports = 'Miami,NY,LA'): array
    {
        return $this->http()->get('/vehicles/' . rawurlencode($vinOrLotNumber) . '/shipping', [
            'ports' => $ports,
        ])->throw()->json();
    }
}
