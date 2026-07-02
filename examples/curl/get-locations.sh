#!/usr/bin/env bash
set -euo pipefail
: "${APIBARA_API_KEY:?Missing APIBARA_API_KEY}"
BASE_URL="${APIBARA_BASE_URL:-https://apibara.tech/api/v1/vehicle-auction}"

curl "${BASE_URL}/locations?platform=copart&state=FL&per_page=50" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
