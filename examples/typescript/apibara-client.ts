import "dotenv/config";

const API_KEY = process.env.APIBARA_API_KEY;
const BASE_URL = process.env.APIBARA_BASE_URL || "https://apibara.tech/api/v1/vehicle-auction";

export type VehicleSearchParams = {
  s?: string;
  make?: string;
  model?: string;
  year_from?: number;
  year_to?: number;
  price_min?: number;
  price_max?: number;
  lot_status?: "All" | "Timed" | "Buy Now";
  lot_sub_status?: "Live" | "Open" | "Ended";
  auction_type?: "0" | "1" | "2";
  per_page?: number;
  cursor?: string;
};

export async function apibaraGet<T>(path: string, params: Record<string, unknown> = {}): Promise<T> {
  if (!API_KEY) {
    throw new Error("Missing APIBARA_API_KEY environment variable.");
  }

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

  const text = await response.text();

  if (!response.ok) {
    throw new Error(`Apibara API error ${response.status}: ${text}`);
  }

  return JSON.parse(text) as T;
}
