#!/usr/bin/env bash
set -euo pipefail
: "${APIBARA_API_KEY:?Missing APIBARA_API_KEY}"
BASE_URL="${APIBARA_BASE_URL:-https://apibara.tech/api/v1/vehicle-auction}"
VEHICLE_URL="${1:-https://www.copart.com/lot/51015256/clean-title-2014-cadillac-escalade-esv-platinum-me-windham}"

curl --get "${BASE_URL}/vehicles/urltodetails" \
  --data-urlencode "url=${VEHICLE_URL}" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
