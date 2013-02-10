"""

Read database, auto generate content and send email + text

"""
import os
import sys
import MySQLdb
import datetime
username = sys.argv[1:]
db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="83872113", db="oplus")

cursor = db.cursor()
cursor.execute(""" SELECT * FROM assignments""")


a= cursor.fetchall()

messagelist = []
for item in a:
    username , subject, assignment, due = item[1], item[2], item[3], datetime.datetime.fromtimestamp(int(item[4][:-2])).strftime('%Y-%m-%d %H:%M:%S')
    message = "Your "+subject+" assignment: "+assignment+" is dued at "+ due
    messagelist.append(message)

message = ' '.join(messagelist) + ' Sent from owl$lus'

email = str(username)+'@rice.edu'

cursor.execute("SELECT  phone FROM preferences WHERE netid = '"+username+"';")


number = cursor.fetchall()

print "python send_text.py "+str(number[0][0])+" '"+message+"'"
if number!=():
    os.system("python send_text.py "+str(number[0][0])+" '"+message+"'")

os.system("python send_mail.py "+ email+" '"+  message+ "' ")
    

    


