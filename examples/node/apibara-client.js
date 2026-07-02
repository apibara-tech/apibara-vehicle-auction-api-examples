import "dotenv/config";

const API_KEY = process.env.APIBARA_API_KEY;
const BASE_URL = process.env.APIBARA_BASE_URL || "https://apibara.tech/api/v1/vehicle-auction";

if (!API_KEY) {
  throw new Error("Missing APIBARA_API_KEY environment variable.");
}

export async function apibaraGet(path, params = {}) {
  const url = new URL(`${BASE_URL}${path}`);

  for (const [key, value] of Object.entries(params)) {
    if (value !== undefined && value !== null && value !== "") {
      url.searchParams.set(key, String(value));
    }
  }

  const response = await fetch(url, {
    headers: {
      "X-API-Key": API_KEY,
      "Accept": "application/json"
    }
  });

  const bodyText = await response.text();

  if (!response.ok) {
    throw new Error(`Apibara API error ${response.status}: ${bodyText}`);
  }

  return bodyText ? JSON.parse(bodyText) : null;
}
