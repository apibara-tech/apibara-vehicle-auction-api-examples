import { apibaraGet, type VehicleSearchParams } from "./apibara-client.js";

const params: VehicleSearchParams = {
  make: "BMW",
  model: "X5",
  year_from: 2018,
  price_max: 25000,
  lot_sub_status: "Open",
  per_page: 20
};

const data = await apibaraGet("/vehicles", params);
console.log(JSON.stringify(data, null, 2));
