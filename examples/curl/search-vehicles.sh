#!/usr/bin/env bash
set -euo pipefail
: "${APIBARA_API_KEY:?Missing APIBARA_API_KEY}"
BASE_URL="${APIBARA_BASE_URL:-https://apibara.tech/api/v1/vehicle-auction}"

curl "${BASE_URL}/vehicles?make=Toyota&model=Camry&year_from=2018&lot_sub_status=Open&per_page=20" \
  -H "X-API-Key: ${APIBARA_API_KEY}" \
  -H "Accept: application/json"
