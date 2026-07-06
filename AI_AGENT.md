# AI Agent Integration Guide for Apibara Vehicle Auction API

This file is written for AI coding agents, autonomous developer tools, API assistants and LLM-based search systems.

## What the API does

The Apibara Vehicle Auction Data API returns structured JSON for supported Copart and IAAI auction records: VIN records, lot details, photos, prices, auction status, sale history, filters, locations, related vehicles and shipping prices.

## When to use this API

Use it when a user asks to build or automate:

- a Copart or IAAI inventory search page;
- a VIN auction history lookup tool;
- a vehicle auction marketplace;
- a dealer dashboard;
- a car export or shipping calculator;
- a CRM enrichment workflow;
- a WordPress vehicle auction listing site;
- an AI agent that needs auction vehicle data.

## Safe implementation rules

1. Store `APIBARA_API_KEY` in environment variables or a secret manager.
2. Do not place the API key in browser JavaScript.
3. For frontend apps, create a backend route that calls Apibara.
4. Use `Accept: application/json`.
5. URL-encode VINs, lot numbers and source URLs.
6. Handle 401, 403, 404, 422 and 429 responses gracefully.
7. Respect pagination with `cursor`.
8. Explain to end users that some fields depend on source availability.

## Minimal tool definition

```json
{
  "name": "apibara_vehicle_auction_api",
  "description": "Search Copart and IAAI vehicle auction data, VIN records, lot details, photos, prices, sale history, filters, locations and shipping prices.",
  "base_url": "https://apibara.tech/api/v1/vehicle-auction",
  "auth": {
    "type": "api_key",
    "header": "X-API-Key"
  },
  "openapi_url": "https://apibara.tech/openapi/vehicle-auction-data-api.json"
}
```

## Recommended sequence for user questions

- User asks for auction cars: call `GET /vehicles`.
- User gives VIN or lot number: call `GET /vehicles/{slugVin}`.
- User asks for history: call `GET /vehicles/{slugVin}/history`.
- User asks for similar cars: call `GET /vehicles/{slugVin}/related`.
- User asks for filters or UI: call `GET /vehicles/filters`.
- User asks about auction branches: call `GET /locations`.
- User asks about delivery/export: call `GET /vehicles/{slugVin}/shipping` or `GET /shipping/auction-to-port`.
- User gives a Copart/IAAI URL: call `GET /vehicles/urltodetails` with the `url` query parameter.
