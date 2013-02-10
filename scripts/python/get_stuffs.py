#! /usr/bin/env python
import sys
import requests
import re
import time
import datetime
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
raw_list = soup.find_all('ul',attrs = {'id':'siteLinkList'})[0].find_all('li')[1:]

subject_dict = {}

for item in raw_list:

    le_link = re.split('"',str(item))[1]
    le_class = re.split('"',str(item))[3]
    subject_dict[le_class] = le_link


def get_assignment_iframe(link):
    try:
        tab = s.get(link)
        soup = BeautifulSoup(tab.content)
        assignment_link =  soup.find_all('a',attrs = {'class':'icon-sakai-assignment-grades'})[0]['href']
        assignment_page = s.get(assignment_link)
        soup = BeautifulSoup(assignment_page.content)
        iframe_link = soup.find_all('iframe')[0]['src']
        return iframe_link
    except:
        pass

def get_quizzes_iframe(link):
    try:    
        tab = s.get(link)
        soup = BeautifulSoup(tab.content)
        
        assignment_link =  soup.find_all('a',attrs = {'class':'icon-sakai-samigo'})[0]['href']
        assignment_page = s.get(assignment_link)
        soup = BeautifulSoup(assignment_page.content)
        iframe_link = soup.find_all('iframe')[0]['src']
        return iframe_link
    except:
        pass


iframe_dict = {}

for item in subject_dict:
    try:
        assignment_link = get_assignment_iframe(subject_dict[item])
        iframe_dict[item] = assignment_link
    except:
        pass


quiz_iframe_dict = {}
for item in subject_dict:
    try:
        quiz_link = get_quizzes_iframe(subject_dict[item])
        quiz_iframe_dict[item] = quiz_link
    except:
        pass


remove = []
for item in iframe_dict:
    if iframe_dict[item] == None:
        remove.append(item)
for item in remove:
    iframe_dict.pop(item)

remove = []
for item in quiz_iframe_dict:
    if quiz_iframe_dict[item] == None:
        remove.append(item)
for item in remove:
    quiz_iframe_dict.pop(item)


def makelist(table):
  result = []
  allrows = table.findAll('tr')
  for row in allrows:
    result.append([])
    allcols = row.findAll('td')
    for col in allcols:
      thestrings = [unicode(s) for s in col.findAll(text=True)]
      thetext = ''.join(thestrings)
      result[-1].append(thetext)
  return result






def get_due_dates(subject):

    due_dict = {}

    try:
        r = s.get(iframe_dict[subject])
        soup = BeautifulSoup(r.content)
        a = makelist(soup)
        for each_row in a[1:]:
            due_dict[" ".join(str(each_row[1]).split())] = " ".join(str(each_row[4]).split())
    except:
        pass

    try:
        r = s.get(quiz_iframe_dict[subject])
        soup = BeautifulSoup(r.content)
        b = makelist(soup)

        for each_row in b[1:]:
            due_dict[" ".join(str(each_row[1]).split())] = " ".join(str(each_row[4]).split())
    except:
        pass
    return due_dict

def get_due_quizzes(subject):
    try:
        r = s.get(quiz_iframe_dict[subject])
        soup = BeautifulSoup(r.content)
        a = makelist(soup)
        due_dict = {}
        for each_row in a[1:]:
            due_dict[" ".join(str(each_row[1]).split())] = " ".join(str(each_row[4]).split())
        return due_dict
    except:
        return



due_dates_dict = {}
for subject in subject_dict:
    if subject in quiz_iframe_dict or subject in iframe_dict:
        due_dates_dict[subject] = get_due_dates(subject)

#quizzes_dict = {}
#for subject in subject_dict:
#    quizzes_dict[subject] = get_due_quizzes(subject)




def convert_time(t):
    t = t.replace(',','')
    t = t.split()
    t[2] = t[2][2:]
    t[3] = t[3]+':00'
    ampm = t.pop(-1)
    if ampm == 'pm':
        hours = t[3]
        t[3] = str(int(t[3][:-6])+12)
        t[3] = t[3] + hours[-6:]
    t = ' '.join(t)
    return time.mktime(datetime.datetime.strptime(t,"%b %d %y %H:%M:%S").timetuple())




#print due_dates_dict

for subject in due_dates_dict:
    assignments = due_dates_dict[subject]
    for assignment in assignments:
        assignments[assignment] = convert_time(assignments[assignment])

print due_dates_dict

