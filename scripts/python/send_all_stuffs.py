"""

Read database, auto generate content and send email + text

"""

import sys
import MySQLdb
import datetime
username = sys.argv[1:]
db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="83872113", db="oplus")

cursor = db.cursor()
cursor.execute(""" SELECT * FROM assignments""")


a= cursor.fetchall()
print a

for item in a:
    username , subject, assignment, due = item[1], item[2], item[3], datetime.datetime.fromtimestamp(int(item[4][:-2])).strftime('%Y-%m-%d %H:%M:%S')

    print username, subject, assignment, due
