import MySQLdb
import os

db = MySQLdb.connect(host="localhost", port=3306, user="root", passwd="83872113", db="oplus")

cursor = db.cursor()

cursor.execute("SELECT * FROM users;")
a= cursor.fetchall()

for item in a:
    if item[2]!= None:
        command = "python get_stuffs.py "+ "'"+str(item[1]) +"' "+ "'"+ str(item[2])+"' "

        os.system(command)
