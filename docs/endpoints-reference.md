# Endpoints Reference

Base URL:

```text
https://apibara.tech/api/v1/vehicle-auction
```

All endpoints are protected with the `X-API-Key` header.

## GET `/vehicles`

Search, filter, and paginate Copart and IAAI vehicle auction records.

Example:

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles?make=BMW&model=X5&year_from=2018&price_max=25000&lot_sub_status=Open&per_page=20" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/{slugVin}`

Get full vehicle lot details by VIN or lot number.

`slugVin` can be a VIN or a lot number.

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/WBAVL1C58FVY28848" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/{slugVin}/history`

Get auction history records for a vehicle by VIN or lot number.

Query parameters:

- `per_page`
- `cursor`

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/WBAVL1C58FVY28848/history?per_page=20" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/{slugVin}/related`

Get related or similar auction vehicles by VIN or lot number.

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/WBAVL1C58FVY28848/related" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/filters`

Get available filters metadata for building search forms, dropdowns, filter panels, and marketplace UI.

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/filters" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/{slugVin}/shipping`

Get auction-to-port shipping prices for a selected vehicle.

Query parameters:

- `ports` — comma-separated destination ports, for example `Chicago,NY,Miami,Savannah,Norfolk,Houston,LA,Seattle,Moto_ATV`

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles/WBAVL1C58FVY28848/shipping?ports=Miami,NY,LA" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/locations`

Search Copart and IAAI auction facilities and locations.

Query parameters:

- `platform`
- `state`
- `facility_id`
- `q`
- `zip`
- `radius`
- `units`
- `per_page`

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/locations?platform=copart&state=FL&per_page=50" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/shipping/auction-to-port`

Get delivery prices from auction location to one or more destination ports by VIN or lot number.

Query parameters:

- `vin`
- `lot_number`
- `ports`

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/shipping/auction-to-port?vin=5TFLA5DBXTX349827&ports=Miami,NY,LA" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```

## GET `/vehicles/urltodetails`

Resolve structured vehicle details from a Copart or IAAI lot URL.

Query parameters:

- `url` — required vehicle lot URL

```bash
curl --get "https://apibara.tech/api/v1/vehicle-auction/vehicles/urltodetails" \
  --data-urlencode "url=https://www.copart.com/lot/51015256/clean-title-2014-cadillac-escalade-esv-platinum-me-windham" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```
