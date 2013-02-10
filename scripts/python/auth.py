#! /usr/bin/env python
import sys
import requests
import re
from bs4 import BeautifulSoup
username, password = sys.argv[1:3]

url1 = 'https://owlspace-ccm.rice.edu/portal'
url2 = 'https://netid.rice.edu/cas/login?service=https%3A%2F%2Fowlspace-ccm.rice.edu%2Fsakai-login-tool%2Fcontainer'
s = requests.session()

r1 = s.get(url1)
cookies = r1.cookies
#print(cookies)
#print("")
r2 = s.get(url2)
soup = BeautifulSoup(r2.content)
lt_value = r2.content.split()[166][7:-1]
lt = soup.find_all('input',attrs = {'name':"lt"})[0]['value']
exec1=soup.find_all('input',attrs = {'name':"execution"})[0]['value']
payload = {'username':username,'password':password,'warn':'true','lt':lt_value,'execution':exec1,'_eventId':'submit',"submit":"LOGIN","reset":"CLEAR"}

# Log in into owlspace, here we go. 
r3 = s.post(url2,data=payload,params=cookies,verify=False)
soup = BeautifulSoup(r3.content)


print len(str(soup))
print len(str(soup)) > 13000
