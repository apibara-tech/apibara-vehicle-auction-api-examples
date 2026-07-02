from pprint import pprint
from apibara_client import apibara_get

vehicles = apibara_get("/vehicles", {
    "make": "Toyota",
    "model": "Camry",
    "year_from": 2018,
    "lot_sub_status": "Open",
    "per_page": 20,
})

pprint(vehicles)
