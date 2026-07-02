# Vehicle Search Filters Reference

This file lists the currently documented search filters for `GET /vehicles`.

## Text and identity filters

| Parameter | Type | Description | Example |
|---|---:|---|---|
| `s` | string | Search by lot number, VIN, or vehicle title | `BMW X5`, `1HGCM82633A123456`, `12345678` |
| `make` | string | Vehicle make | `BMW` |
| `model` | string | Vehicle model | `X5` |
| `type` | string | Vehicle type | `AUTOMOBILE` |
| `color` | string | Vehicle color | `Black` |

## Auction status filters

| Parameter | Allowed values | Description |
|---|---|---|
| `lot_status` | `All`, `Timed`, `Buy Now` | Lot status filter |
| `lot_sub_status` | `Live`, `Open`, `Ended` | Lot sub-status filter |
| `auction_type` | `0`, `1`, `2` | `0` = All, `1` = Copart, `2` = IAAI |
| `auction_date_from` | date | Auction date from, for example `2026-03-20` |
| `auction_date_to` | date | Auction date to, for example `2026-03-25` |
| `today_only` | boolean | Return only vehicles with auctions today |

## Price and year filters

| Parameter | Type | Description |
|---|---:|---|
| `price_min` | number | Minimum price |
| `price_max` | number | Maximum price |
| `year_from` | integer | Minimum vehicle year |
| `year_to` | integer | Maximum vehicle year |

## Technical vehicle filters

| Parameter | Type / values | Description |
|---|---|---|
| `fuel_type` | `Diesel`, `Hybrid`, `Electric`, `Flexible`, `Gasoline`, `All others` | Fuel type |
| `odometer_from` | number | Minimum odometer value |
| `odometer_to` | number | Maximum odometer value |
| `engine_size_from` | number | Minimum engine size |
| `engine_size_to` | number | Maximum engine size |
| `engine_hp_from` | number | Minimum engine horsepower |
| `engine_hp_to` | number | Maximum engine horsepower |
| `transmission` | `Manual`, `Unknown`, `Automatic` | Transmission type |
| `cylinders` | integer | Number of cylinders |
| `drive_type` | `AWD`, `FWD`, `RWD` | Drive type |
| `run_cond` | `STATIONARY`, `NO INFORMATION`, `RUNS AND DRIVES`, `ENGINE START PROGRAM` | Run condition |
| `damage` | `Fire`, `Hail`, `Theft`, `Water`, `Chemical`, `Rollover`, `Mechanical`, `Vandalized`, `Repossession` | Damage type |
| `has_key` | `No`, `All`, `With` | Key availability |

## Location filters

| Parameter | Type | Description |
|---|---:|---|
| `zip` | string | ZIP code for location-based search |
| `radius` | number | Search radius around ZIP |
| `units` | `km`, `mi` | Distance units |
| `facility_id` | string | Auction facility ID |
| `loc_state` | string | Location state code |
| `office_name` | string | Auction office or branch name |

## Document, seller, and shipping filters

| Parameter | Type / values | Description |
|---|---|---|
| `sale_document_pending` | boolean | Filter by pending sale document |
| `sale_document_type` | string | Sale document type, for example `clean` |
| `seller_type` | `dealer`, `finance`, `insurance`, `non_insurance` | Seller type |
| `has_shipping_price` | boolean | Return only vehicles with shipping price data |

## Pagination

| Parameter | Type | Description |
|---|---:|---|
| `per_page` | integer | Number of records per page |
| `cursor` | string | Cursor for next/previous page |

## Example marketplace filter query

```bash
curl "https://apibara.tech/api/v1/vehicle-auction/vehicles?auction_type=1&make=BMW&model=X5&year_from=2018&price_max=25000&fuel_type=Gasoline&drive_type=AWD&lot_sub_status=Open&per_page=20" \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Accept: application/json"
```
