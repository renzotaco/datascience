#!/usr/bin/env python3
import requests
from bs4 import BeautifulSoup

url = "https://www.worldometers.info/coronavirus/countries-where-coronavirus-has-spread/"

page = requests.get(url)
soup = BeautifulSoup(page.text, 'html.parser')

archivo = open("/var/www/html/webscraping/covid.csv", "w")

data_iterator = iter(soup.find_all('td'))

while True:
        try:
                country = next(data_iterator).text
                confirmed = next(data_iterator).text
                deaths = next(data_iterator).text
                continent = next(data_iterator).text

                archivo.write(country + "|" + confirmed + "|" + deaths + "|" + continent + "\n")

        except StopIteration:
                break

archivo.close()

