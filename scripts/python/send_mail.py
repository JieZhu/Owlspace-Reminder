import smtplib  
import sys
fromaddr = 'owlspaceplus@gmail.com'  
toaddrs,msg  = sys.argv[1:3] 
  
  
# Credentials (if needed)  
username = 'owlspacepluz'  
password = '83872113'  
  
# The actual mail send  
server = smtplib.SMTP('smtp.gmail.com:587')  
server.starttls()  
server.login(username,password)  
server.sendmail(fromaddr, toaddrs, msg)  
server.quit()  
