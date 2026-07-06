# Repository Audit and SEO / AI Improvements

Date: 2026-07-06

## Initial state

The repository already had a solid foundation:

- README.md with product overview.
- llms.txt.
- Documentation files for endpoints, filters, use cases, AI agents and SEO discovery.
- Examples in many languages: cURL, Node.js, TypeScript, Python, PHP, Laravel, Swift, Java, Kotlin, C#, Go, Ruby and WordPress.

## Main improvements added

### AI-agent discovery

Added or expanded:

- `llms-full.txt`
- `AI_AGENT.md`
- `agent-manifest.json`
- `schema.org.jsonld`
- `SUMMARY.md`
- `examples/mcp-server/README.md`
- `examples/mcp-server/src/tools.json`

These files make the repository easier for AI coding agents and LLM search systems to understand without guessing the API purpose, auth method or endpoint workflow.

### SEO and GitHub search

Improved:

- `README.md` with clearer product entity, official links, endpoint table, use cases and keyword coverage.
- `docs/seo-and-ai-discovery.md` with safer keyword strategy and anti-spam guidance.
- `docs/github-repository-settings.md` with repository description, website field and recommended topics.
- `apibara-api-directory-submission.md` for API directory submissions.

### Developer trust

Added:

- `SECURITY.md`
- `CONTRIBUTING.md`
- `.gitignore`
- `.github/workflows/validate-examples.yml`
- `.github/ISSUE_TEMPLATE/integration-help.md`

### Safer frontend integration

Added:

- `examples/nextjs/` server route examples.

This is important because frontend apps should not expose `APIBARA_API_KEY` in browser JavaScript.

### Documentation coverage

Added:

- `docs/pagination-and-errors.md`
- `examples/README.md`
- README files for cURL, Node.js, TypeScript, Python, PHP, Go, Java, Kotlin, C#, Ruby, Next.js and MCP notes.

### Validation performed

The following local checks passed:

- Bash syntax check for `examples/curl/*.sh`.
- Python compile check for `examples/python`.
- Node syntax check for key Node files.
- JSON validation for `agent-manifest.json`, `schema.org.jsonld` and MCP tool JSON.
- PHP syntax check for `examples/php/ApibaraClient.php`.

## Recommended GitHub settings after upload

Repository description:

```text
Code examples and AI-ready integration guides for the Apibara Copart & IAAI Vehicle Auction API: VIN details, lot data, photos, prices, history, filters, locations and shipping.
```

Website:

```text
https://apibara.tech/en/products/vehicle-auction-data-api
```

Topics:

Use `GITHUB_TOPICS.txt`.

Priority topics:

- copart-api
- iaai-api
- vehicle-auction-api
- vin-api
- auction-data
- automotive-api
- openapi
- api-examples
- python
- nodejs
- php
- laravel
- wordpress
- swift
- java

## Next recommendations

1. Upload the updated files to GitHub.
2. Make sure GitHub repository description, website and topics are filled in.
3. Add a link to this GitHub repo from the Apibara product page, docs page and llms-full.txt on the website.
4. Add this repository URL to API directories and developer listings.
5. Keep examples aligned with the official OpenAPI schema whenever endpoints change.
