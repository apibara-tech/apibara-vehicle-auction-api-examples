import { apibaraGet } from "./apibara-client.js";

const vinOrLot = process.argv[2] || "WBAVL1C58FVY28848";
const data = await apibaraGet(`/vehicles/${encodeURIComponent(vinOrLot)}/history`, { per_page: 20 });

console.log(JSON.stringify(data, null, 2));
