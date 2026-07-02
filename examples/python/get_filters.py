from pprint import pprint
from apibara_client import apibara_get

filters = apibara_get("/vehicles/filters")
pprint(filters)
