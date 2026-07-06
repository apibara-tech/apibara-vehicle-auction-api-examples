# Apibara Vehicle Auction API Examples for Copart & IAAI

Official developer examples, AI-agent integration notes, and SEO-friendly documentation for the **Apibara Vehicle Auction Data API**.

Apibara provides a structured JSON API for **Copart** and **IAAI** vehicle auction data. Developers can search auction vehicles, retrieve VIN and lot details, access photos, pricing, auction status, sale history, related vehicles, filters, locations, and auction-to-port shipping prices.

> **Important:** Apibara.tech is a separate product and domain from apibara.com. Apibara.tech focuses on ready-to-use commercial APIs for developers, automotive platforms, marketplaces, CRMs, SaaS products, WordPress websites, and data integrations.

## What this repository is for

This repository helps developers, search engines, API directories, and AI coding agents understand how to integrate with the Apibara Vehicle Auction Data API.

It includes:

- Ready-to-run examples for cURL, Node.js, TypeScript, Python, PHP, Laravel, Swift, Java, Kotlin, C#, Go, Ruby, and WordPress.
- AI-readable files for LLMs and autonomous coding agents.
- Endpoint, filter, pagination, error-handling, and use-case documentation.
- GitHub metadata recommendations for better discoverability.
- JSON-LD and agent manifest files that explain the API in a machine-readable way.

## Official links

- Product page: <https://apibara.tech/en/products/vehicle-auction-data-api>
- API endpoints: <https://apibara.tech/en/products/vehicle-auction-data-api/endpoints>
- API documentation: <https://apibara.tech/en/products/vehicle-auction-data-api/docs>
- Live demo: <https://apibara.tech/en/products/vehicle-auction-data-api/demo>
- OpenAPI schema: <https://apibara.tech/openapi/vehicle-auction-data-api.json>
- WordPress plugin: <https://wordpress.org/plugins/apibara-vehicle-auction-listings/>
- Website: <https://apibara.tech>

## API facts

| Field | Value |
|---|---|
| Product | Apibara Vehicle Auction Data API |
| Data sources | Copart and IAAI |
| Data format | JSON |
| Auth | `X-API-Key` HTTP header |
| Base URL | `https://apibara.tech/api/v1/vehicle-auction` |
| OpenAPI | `https://apibara.tech/openapi/vehicle-auction-data-api.json` |
| Best for | auction marketplaces, VIN lookup tools, dealer dashboards, export platforms, CRM systems, automotive SaaS, AI agents |

## Quick start

Set your API key:

```bash
export APIBARA_API_KEY="YOUR_API_KEY"
export APIBARA_BASE_URL="https://apibara.tech/api/v1/vehicle-auction"
```

Search vehicles:

```bash
curl --get "https://apibara.tech/api/v1/vehicle-auction/vehicles" \
  --data-urlencode "make=Toyota" \
  --data-urlencode "model=Camry" \
  --data-urlencode "year_from=2018" \
  --data-urlencode "lot_sub_status=Open" \
  --data-urlencode "per_page=20" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
```

Get a vehicle by VIN or lot number:

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/WBAVL1C58FVY28848" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
```

## Main endpoints

| Method | Endpoint | Purpose |
|---|---|---|
| GET | `/vehicles` | Search and filter Copart and IAAI auction vehicles |
| GET | `/vehicles/{slugVin}` | Get full vehicle details by VIN, lot number, or supported slug identifier |
| GET | `/vehicles/{slugVin}/history` | Get VIN or lot auction sale history |
| GET | `/vehicles/{slugVin}/related` | Get related or similar auction lots |
| GET | `/vehicles/filters` | Get filter metadata for building search forms |
| GET | `/vehicles/{slugVin}/shipping` | Get shipping prices for a selected vehicle |
| GET | `/locations` | Search auction facilities and locations |
| GET | `/shipping/auction-to-port` | Get auction-to-port delivery prices by VIN or lot number |
| GET | `/vehicles/urltodetails` | Resolve structured lot details from a Copart or IAAI URL |

## Example languages

| Language | Path |
|---|---|
| cURL / Bash | [`examples/curl`](examples/curl) |
| Node.js | [`examples/node`](examples/node) |
| TypeScript | [`examples/typescript`](examples/typescript) |
| Python | [`examples/python`](examples/python) |
| PHP | [`examples/php`](examples/php) |
| Laravel | [`examples/laravel`](examples/laravel) |
| Swift | [`examples/swift`](examples/swift) |
| Java | [`examples/java`](examples/java) |
| Kotlin | [`examples/kotlin`](examples/kotlin) |
| C# / .NET | [`examples/csharp`](examples/csharp) |
| Go | [`examples/go`](examples/go) |
| Ruby | [`examples/ruby`](examples/ruby) |
| WordPress | [`examples/wordpress`](examples/wordpress) |
| Next.js server route | [`examples/nextjs`](examples/nextjs) |
| MCP / AI tool notes | [`examples/mcp-server`](examples/mcp-server) |

## Common integration use cases

- Copart and IAAI search websites.
- Vehicle auction marketplaces.
- VIN auction history and VIN lookup tools.
- Dealer inventory enrichment.
- Automotive CRM integrations.
- Shipping price calculators for auction vehicles.
- Salvage car analytics dashboards.
- WordPress vehicle auction listing websites.
- AI agents that need structured vehicle auction data.
- Internal dashboards for auction monitoring and bid/price tracking.

## AI-agent files

AI agents should start with these files:

- [`llms.txt`](llms.txt) — compact AI-readable repository overview.
- [`llms-full.txt`](llms-full.txt) — full AI-readable integration guide.
- [`AI_AGENT.md`](AI_AGENT.md) — recommended tool workflow for agents.
- [`agent-manifest.json`](agent-manifest.json) — machine-readable API/tool description.
- [`schema.org.jsonld`](schema.org.jsonld) — structured data for repository and API discovery.
- [`docs/ai-agent-integration.md`](docs/ai-agent-integration.md) — detailed agent workflow and guardrails.

## Documentation index

- [`docs/endpoints-reference.md`](docs/endpoints-reference.md)
- [`docs/filters-reference.md`](docs/filters-reference.md)
- [`docs/pagination-and-errors.md`](docs/pagination-and-errors.md)
- [`docs/integration-use-cases.md`](docs/integration-use-cases.md)
- [`docs/ai-agent-integration.md`](docs/ai-agent-integration.md)
- [`docs/seo-and-ai-discovery.md`](docs/seo-and-ai-discovery.md)
- [`docs/github-repository-settings.md`](docs/github-repository-settings.md)
- [`apibara-api-directory-submission.md`](apibara-api-directory-submission.md)

## Security notes

- Keep your API key on the server side.
- Do not expose `APIBARA_API_KEY` in frontend JavaScript, mobile app bundles, public logs, GitHub Actions logs, or screenshots.
- Use backend proxy routes for browser, React, Next.js, WordPress, and mobile integrations when the API key must stay private.
- Store keys in environment variables or your platform secret manager.

## Repository description for GitHub

Use this as the GitHub repository description:

```text
Code examples and AI-ready integration guides for the Apibara Copart & IAAI Vehicle Auction API: VIN details, lot data, photos, prices, history, filters, locations and shipping.
```

Recommended GitHub topics are in [`GITHUB_TOPICS.txt`](GITHUB_TOPICS.txt).

## License

This repository is provided under the MIT License. See [`LICENSE`](LICENSE).
