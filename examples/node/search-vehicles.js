import { apibaraGet } from "./apibara-client.js";

const data = await apibaraGet("/vehicles", {
  make: "Toyota",
  model: "Camry",
  year_from: 2018,
  lot_sub_status: "Open",
  per_page: 20
});

console.log(JSON.stringify(data, null, 2));
