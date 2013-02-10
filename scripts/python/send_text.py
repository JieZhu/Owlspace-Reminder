#! /usr/bin/env python
import commands
import sys
phone, message = sys.argv[1:3]


command = "curl -X POST 'https://api.twilio.com/2010-04-01/Accounts/AC7af756065e479f2498715b47ddf0fc4a/SMS/Messages.json' -d 'From=%2B12813771843' -d 'To=%2B1"+ phone +"' -d 'Body="+message+ "' -u AC7af756065e479f2498715b47ddf0fc4a:329a19ff9099dad75522a5cdcc435e22"

print commands.getstatusoutput(command)
