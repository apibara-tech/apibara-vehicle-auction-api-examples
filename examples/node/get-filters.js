import { apibaraGet } from "./apibara-client.js";

const data = await apibaraGet("/vehicles/filters");
console.log(JSON.stringify(data, null, 2));
