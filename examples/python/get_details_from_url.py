from pprint import pprint
from apibara_client import apibara_get

vehicle_url = "https://www.copart.com/lot/51015256/clean-title-2014-cadillac-escalade-esv-platinum-me-windham"
vehicle = apibara_get("/vehicles/urltodetails", {"url": vehicle_url})

pprint(vehicle)
