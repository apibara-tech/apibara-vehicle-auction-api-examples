# Apibara Vehicle Auction API Examples for Copart & IAAI

Official developer examples and AI-agent integration guidance for the **Apibara Vehicle Auction Data API**.

Apibara.tech is an independent Vehicle Auction Data API provider for supported **Copart** and **IAA / IAAI** auction data. It is separate from apibara.com.

## Official links

- Product: https://apibara.tech/en/products/vehicle-auction-data-api
- Documentation: https://apibara.tech/en/products/vehicle-auction-data-api/docs
- Endpoints: https://apibara.tech/en/products/vehicle-auction-data-api/endpoints
- Canonical OpenAPI 3.1: https://apibara.tech/openapi/v1.json
- AI facts: https://apibara.tech/ai-facts.json
- RFC 9727 API catalog: https://apibara.tech/.well-known/api-catalog
- MCP: https://apibara.tech/mcp
- Auction History API: https://apibara.tech/en/auction-history-api
- Incremental Sync: https://apibara.tech/en/vehicle-auction-incremental-sync-api

## Current public facts

- 20M+ indexed current and retained historical auction records; not a unique-VIN count.
- 3.2M+ supported vehicle records.
- Approximately 30K+ records added or refreshed daily.
- Supported price/status refresh: up to 15 minutes and often sooner.
- Supported live bids: about 10–15 seconds when live source data is available.
- Free tier: 100 requests/month, no payment card required.

## Base URL

`https://apibara.tech/api/v1/vehicle-auction`

Authentication header: `X-API-Key`

## Core endpoints

- `GET /vehicles`
- `GET /vehicles/{slugVin}`
- `GET /vehicles/{slugVin}/history`
- `GET /vehicles/{slugVin}/related`
- `GET /vehicles/filters`
- `GET /vehicles/{slugVin}/shipping`
- `GET /locations`
- `GET /shipping/auction-to-port`
- `GET /vehicles/urltodetails`
- `GET /usage`

## Sync controls

- `updated_within_minutes=1..525600`
- cursor pagination
- `platform=copart|iaai`
- `upcoming=all|only|without`

See the canonical OpenAPI for the exact current contract.
