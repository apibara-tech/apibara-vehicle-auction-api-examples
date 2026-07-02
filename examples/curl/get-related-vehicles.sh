#!/usr/bin/env bash
set -euo pipefail
: "${APIBARA_API_KEY:?Missing APIBARA_API_KEY}"
BASE_URL="${APIBARA_BASE_URL:-https://apibara.tech/api/v1/vehicle-auction}"
VIN_OR_LOT="${1:-WBAVL1C58FVY28848}"

curl "${BASE_URL}/vehicles/${VIN_OR_LOT}/related" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
