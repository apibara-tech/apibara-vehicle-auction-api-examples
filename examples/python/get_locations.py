from pprint import pprint
from apibara_client import apibara_get

locations = apibara_get("/locations", {
    "platform": "copart",
    "state": "FL",
    "per_page": 50,
})

pprint(locations)
