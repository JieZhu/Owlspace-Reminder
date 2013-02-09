import sys
import os
num, content = sys.argv[1:3]

provider_list = ['txt.att.net','qwestmp.com','tmomail.net','vtext.com','messaging.sprintpcs.com','pm.sprint.com','vmobl.com','messaging.nextel.com','message.alltel.com','mymetropcs.com','ptel.com','myboostmobile.com','tms.suncom.com','mmst5.tracfone.com','email.uscc.net']

send_list = []

for item in provider_list:
    send_list.append(str(num)+"@"+item)



for item in send_list:
    command =" sendEmail -f owlspacereminder@gmail.com -t " + str(item)+" -m " + str(content) + " -s smtp.gmail.com -o tls=yes -xu owlspacereminder -xp 83872113"
    os.system(command)

