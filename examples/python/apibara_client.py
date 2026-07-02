import os
from typing import Any, Dict, Optional

import requests
from dotenv import load_dotenv

load_dotenv()

API_KEY = os.getenv("APIBARA_API_KEY")
BASE_URL = os.getenv("APIBARA_BASE_URL", "https://apibara.tech/api/v1/vehicle-auction")

if not API_KEY:
    raise RuntimeError("Missing APIBARA_API_KEY environment variable.")


def apibara_get(path: str, params: Optional[Dict[str, Any]] = None) -> Any:
    response = requests.get(
        f"{BASE_URL}{path}",
        headers={
            "X-API-Key": API_KEY,
            "Accept": "application/json",
        },
        params={k: v for k, v in (params or {}).items() if v is not None and v != ""},
        timeout=30,
    )

    response.raise_for_status()
    return response.json()
