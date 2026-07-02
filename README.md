# Apibara Copart & IAAI Vehicle Auction API Examples

Official code examples and integration notes for the **Apibara Copart & IAAI Vehicle Auction API**.

Apibara provides a structured JSON API for Copart and IAAI vehicle auction data. Developers can search auction vehicles, retrieve VIN and lot details, access auction photos, prices, auction status, sale history, related vehicles, filters, locations, and auction-to-port shipping prices.

## Official links

- Product page: <https://apibara.tech/en/products/vehicle-auction-data-api>
- API endpoints: <https://apibara.tech/en/products/vehicle-auction-data-api/endpoints>
- API documentation: <https://apibara.tech/en/products/vehicle-auction-data-api/docs>
- OpenAPI definition: <https://apibara.tech/openapi/vehicle-auction-data-api.json>
- Website: <https://apibara.tech>

## Base URL

```text
https://apibara.tech/api/v1/vehicle-auction
```

## Authentication

All protected API requests use the `X-API-Key` HTTP header.

```http
X-API-Key: YOUR_API_KEY
Accept: application/json
```

## Quick start with cURL

```bash
export APIBARA_API_KEY="YOUR_API_KEY"

curl "https://apibara.tech/api/v1/vehicle-auction/vehicles?make=Toyota&model=Camry&year_from=2018&lot_sub_status=Open&per_page=20" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
```

## Main endpoints

| Method | Endpoint | Purpose |
|---|---|---|
| GET | `/vehicles` | Search and filter Copart and IAAI auction vehicles |
| GET | `/vehicles/{slugVin}` | Get full vehicle details by VIN or lot number |
| GET | `/vehicles/{slugVin}/history` | Get VIN or lot auction sale history |
| GET | `/vehicles/{slugVin}/related` | Get related or similar auction lots |
| GET | `/vehicles/filters` | Get filter metadata for building search forms |
| GET | `/vehicles/{slugVin}/shipping` | Get shipping prices for a selected vehicle |
| GET | `/locations` | Search auction facilities and locations |
| GET | `/shipping/auction-to-port` | Get auction-to-port delivery prices by VIN or lot number |
| GET | `/vehicles/urltodetails` | Resolve structured lot details from a Copart or IAAI URL |

## Included examples

This repository includes examples for:

- cURL / Bash
- JavaScript / Node.js
- TypeScript
- Python
- PHP
- Laravel
- Swift
- Java
- Kotlin
- C# / .NET
- Go
- Ruby
- WordPress shortcode/plugin integration notes

## Common use cases

- Copart and IAAI search websites
- Vehicle auction marketplaces
- VIN auction history tools
- Dealer inventory enrichment
- Automotive CRM systems
- Shipping price calculators
- Salvage car analytics dashboards
- WordPress vehicle auction listing websites
- AI agents that need structured vehicle auction data

## Repository structure

```text
examples/
  curl/
  node/
  typescript/
  python/
  php/
  laravel/
  swift/
  java/
  kotlin/
  csharp/
  go/
  ruby/
docs/
  endpoints-reference.md
  filters-reference.md
  integration-use-cases.md
  ai-agent-integration.md
  seo-and-ai-discovery.md
```

## Environment variables

Copy `.env.example` to `.env` and add your API key.

```bash
cp .env.example .env
```

```env
APIBARA_API_KEY=your_api_key_here
APIBARA_BASE_URL=https://apibara.tech/api/v1/vehicle-auction
```

## OpenAPI

The machine-readable OpenAPI definition is available here:

```text
https://apibara.tech/openapi/vehicle-auction-data-api.json
```

You can use it with API clients, SDK generators, Postman, Insomnia, Swagger UI, Redoc, AI agents, and documentation tools.

## Support

- Website: <https://apibara.tech>
- Contact: <https://apibara.tech/en/contact>
- Terms: <https://apibara.tech/en/terms>
