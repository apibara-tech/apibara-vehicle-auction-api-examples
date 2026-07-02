import { apibaraGet } from "./apibara-client.js";

const vinOrLot = process.argv[2] || "WBAVL1C58FVY28848";
const data = await apibaraGet(`/vehicles/${encodeURIComponent(vinOrLot)}/shipping`, {
  ports: "Miami,NY,LA"
});

console.log(JSON.stringify(data, null, 2));
