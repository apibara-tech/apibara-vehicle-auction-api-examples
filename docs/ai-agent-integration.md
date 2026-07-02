# AI Agent Integration Guide

The Apibara Copart & IAAI Vehicle Auction API is suitable for AI agents that need structured vehicle auction data.

## Machine-readable API definition

```text
https://apibara.tech/openapi/vehicle-auction-data-api.json
```

## Recommended agent workflow

1. Use `/vehicles` to search inventory by make, model, VIN, lot number, title, auction status, location, price range, year range, damage, seller type, or shipping availability.
2. Use `/vehicles/{slugVin}` to retrieve full lot details.
3. Use `/vehicles/{slugVin}/history` to answer VIN auction history questions.
4. Use `/vehicles/{slugVin}/related` to recommend similar auction lots.
5. Use `/vehicles/{slugVin}/shipping` or `/shipping/auction-to-port` to estimate delivery prices.
6. Use `/vehicles/filters` to generate user-facing filter forms.
7. Use `/locations` to answer questions about Copart and IAAI auction locations.

## Authentication

Agents must send the `X-API-Key` header.

```http
X-API-Key: YOUR_API_KEY
```

## Example AI tool description

Apibara Copart & IAAI Vehicle Auction API provides structured JSON data for vehicle auction listings, VIN and lot details, auction photos, prices, auction status, sale history, related vehicles, filters, locations, and auction-to-port shipping prices.
