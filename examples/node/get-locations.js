import { apibaraGet } from "./apibara-client.js";

const data = await apibaraGet("/locations", {
  platform: "copart",
  state: "FL",
  per_page: 50
});

console.log(JSON.stringify(data, null, 2));
