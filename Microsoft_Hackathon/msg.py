import os
import sys
from twilio.rest import Client
v=sys.argv[1]
msg="QR code was tried to be generated at Toll Tax "+v+" of Your Car"
account_sid = "AC5adda6db593a0f369a427283c8436959"
auth_token = "fc647306d1cd37646ac0f1f23c55e612"
client = Client(account_sid, auth_token)
client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg)
print("Message Sent")
                
