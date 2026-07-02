import { apibaraGet } from "./apibara-client.js";

const vinOrLot = process.argv[2] || "WBAVL1C58FVY28848";
const data = await apibaraGet(`/vehicles/${encodeURIComponent(vinOrLot)}`);

console.log(JSON.stringify(data, null, 2));
