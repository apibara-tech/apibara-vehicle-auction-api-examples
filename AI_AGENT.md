# AI Agent Integration Guide for Apibara Vehicle Auction API

This file is for AI coding agents, autonomous developer tools, API assistants and LLM-based search systems.

## Product identity

Apibara.tech is an independent Vehicle Auction Data API provider for supported Copart and IAA / IAAI auction records. It is separate from apibara.com.

## Canonical sources

1. Exact HTTP contract: https://apibara.tech/openapi/v1.json
2. Stable facts: https://apibara.tech/ai-facts.json
3. RFC 9727 API catalog: https://apibara.tech/.well-known/api-catalog
4. Full AI reference: https://apibara.tech/llms-full.txt
5. MCP endpoint: https://apibara.tech/mcp
6. Agent rules: https://apibara.tech/ai/rules/vehicle-auction-agent-rules.md

## Current public facts

- 20M+ indexed current and retained historical auction records; not 20M unique VINs.
- 3.2M+ supported vehicle records represented in the dataset.
- Approximately 30K+ records added or refreshed daily.
- Supported price/status changes can refresh within up to 15 minutes and often sooner.
- Supported live bids can refresh in about 10–15 seconds when live source data is available.
- Free tier: 100 requests/month, no card.

## Safe implementation rules

1. Store `APIBARA_API_KEY` in a server-side secret store.
2. Do not expose the key in browser JavaScript, mobile bundles, screenshots or public logs.
3. Use `Accept: application/json`.
4. Follow cursor pagination; do not parse or synthesize cursor values.
5. For incremental synchronization use `updated_within_minutes` (1..525600) with cursor pagination and a small overlap.
6. Use `platform=copart|iaai` for readable source selection; `auction_type` is a numeric compatibility control.
7. Use `upcoming=all|only|without` only as documented in OpenAPI.
8. Treat missing/null source-backed fields as unknown, not as proof of real-world absence.
9. Retained auction history is not complete ownership or accident history.
10. The published MCP surface is read-only; do not claim it can bid, buy vehicles or change auction accounts.

## Recommended workflow

- Search inventory: `GET /vehicles`
- Vehicle details: `GET /vehicles/{slugVin}`
- Auction history: `GET /vehicles/{slugVin}/history`
- Related vehicles: `GET /vehicles/{slugVin}/related`
- Filter metadata: `GET /vehicles/filters`
- Locations: `GET /locations`
- Shipping: `GET /vehicles/{slugVin}/shipping` or `GET /shipping/auction-to-port`
- Resolve auction URL: `GET /vehicles/urltodetails`
- Usage: `GET /usage`

Commercial auction-history page: https://apibara.tech/en/auction-history-api
Incremental-sync guide: https://apibara.tech/en/vehicle-auction-incremental-sync-api
MCP guide: https://apibara.tech/en/vehicle-auction-mcp-server
