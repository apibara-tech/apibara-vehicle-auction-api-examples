import sys
from pprint import pprint
from apibara_client import apibara_get

vin_or_lot = sys.argv[1] if len(sys.argv) > 1 else "WBAVL1C58FVY28848"
vehicle = apibara_get(f"/vehicles/{vin_or_lot}")

pprint(vehicle)
