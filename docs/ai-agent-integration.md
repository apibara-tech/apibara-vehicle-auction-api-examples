# AI Agent Integration Guide

Use these canonical resources first:

- OpenAPI 3.1: https://apibara.tech/openapi/v1.json
- AI facts: https://apibara.tech/ai-facts.json
- RFC 9727 API catalog: https://apibara.tech/.well-known/api-catalog
- MCP: https://apibara.tech/mcp
- Agent rules: https://apibara.tech/ai/rules/vehicle-auction-agent-rules.md

## Workflow

1. Read OpenAPI for exact parameters and schemas.
2. Use `GET /vehicles` for search.
3. Use `platform=copart|iaai` for readable source filtering.
4. Use `upcoming=all|only|without` only as documented.
5. Use `updated_within_minutes=1..525600` plus cursor pagination for incremental sync.
6. Use `GET /vehicles/{slugVin}/history` for retained auction history.
7. Keep `X-API-Key` server-side.

Auction history is not complete ownership or accident history. Missing/null fields are expected. MCP is read-only.
