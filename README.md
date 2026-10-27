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

- **20M+ lifetime/cumulative indexed auction records** across the lifetime of Apibara.tech. This is NOT the current retained dataset and is not a count of unique VINs or vehicles.
- **4,061,492 current supported vehicle/lot records (4.0M+)** in the production retained-data snapshot.
- **5,894,013 retained historical auction records**, bringing the current + historical retained total to **9,955,505 records (9.9M+)**.
- **Measured at:** 2026-10-27 11:30:02 UTC. These figures are a dated snapshot and will change as inventory refreshes. For current counts and source breakdown, use [live Coverage](https://apibara.tech/coverage.json) or [AI facts](https://apibara.tech/ai-facts.json).
- Approximately 30K+ records added or refreshed daily.
- Supported price/status refresh: up to 15 minutes and often sooner.
- Supported live bids: about 10–15 seconds when live source data is available.
- Free tier: 100 requests/month, no payment card required.

For future measurements always use the [live coverage endpoint](https://apibara.tech/coverage.json); snapshot totals above are historical, not a live counter.

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
