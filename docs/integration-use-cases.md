# Integration Use Cases

## Vehicle auction marketplace

Use `GET /vehicles` for the listing page, `GET /vehicles/{slugVin}` for the details page, `GET /vehicles/filters` for dynamic filters, and `GET /vehicles/{slugVin}/related` for similar vehicles.

## VIN auction history tool

Use `GET /vehicles/{slugVin}` and `GET /vehicles/{slugVin}/history` to build VIN lookup pages with sale history, auction status, pricing, and lot data.

## Shipping calculator

Use `GET /vehicles/{slugVin}/shipping` or `GET /shipping/auction-to-port` to show auction-to-port delivery price estimates.

## Auction locations directory

Use `GET /locations` to build pages by platform, state, ZIP, city, or facility ID.

## WordPress auction website

Use the Apibara WordPress plugin or call the API directly from a custom WordPress theme/plugin.

## AI agent integration

Use the OpenAPI definition to let an AI agent discover endpoints, generate API calls, retrieve structured auction data, and answer user questions about vehicle lots, VIN history, filters, locations, and shipping prices.
