#!/usr/bin/env python

import requests
import base64
import time
import sys

url = "URL_of_the_challenge"

session = requests.Session()
rs = session.get(url)

get = base64.b64decode(rs.headers['bullet'])
data = {
    "fire": get
}
print session.post(url, data=data).text
