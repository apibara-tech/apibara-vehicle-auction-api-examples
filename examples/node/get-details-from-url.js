import { apibaraGet } from "./apibara-client.js";

const vehicleUrl = process.argv[2] || "https://www.copart.com/lot/51015256/clean-title-2014-cadillac-escalade-esv-platinum-me-windham";
const data = await apibaraGet("/vehicles/urltodetails", { url: vehicleUrl });

console.log(JSON.stringify(data, null, 2));
