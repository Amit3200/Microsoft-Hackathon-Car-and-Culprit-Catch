import face_recognition
import cv2
import MySQLdb
from datetime import datetime
from time import gmtime, strftime
from twilio.rest import Client
import sys,os
pokermsg=[]

def db(name):
     global imgname,last_case,last_link,last_case,last_date
     db=MySQLdb.connect(host="localhost",user="root",password="amit",db="rajasthan")
     cur=db.cursor()
     query="select * from criminal_record where cname='"+name+"';"
     cur.execute(query)
     for row in cur.fetchall():
          imgname=row[1]
          last_case=row[2]
          last_date=row[3]
          last_link=row[4]
     print(imgname,last_case,last_link,last_date)
     db.close()


def culprit_match():
     f=0
     k=0
     global pokermsg
     global imgname,last_case,last_link,last_case,last_date
     video_capture = cv2.VideoCapture(0)
     Picture_face_encoding=[]
     Pic_image1 = face_recognition.load_image_file("Amit.jpeg")
     Pic_face_encoding1 = face_recognition.face_encodings(Pic_image1)[0]
     Pic_image2 = face_recognition.load_image_file("Debashish.jpg")
     Pic_face_encoding2 = face_recognition.face_encodings(Pic_image2)[0]
     face_locations = []
     known_face_encodings = [Pic_face_encoding1,Pic_face_encoding2]
     known_face_names = ["Amit Singh","Debashish Bhol"]
     face_names=[]
     face_encodings=[]
     
     process_this_frame = True
     while True:
         ret, frame = video_capture.read()
         small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
         if process_this_frame:
             face_locations = face_recognition.face_locations(small_frame)
             face_encodings = face_recognition.face_encodings(small_frame, face_locations)
             face_names = []
             for face_encoding in face_encodings:
                 match = face_recognition.compare_faces(known_face_encodings, face_encoding)
                 name = "Unknown"
                 if True in match:
                     f_index=match.index(True)
                     name=known_face_names[f_index]
                     db(name)
                     f=1
                     msg="Culprit Found. Details are here. Name - "+name+" and Criminal Case is "+last_case+" Dated - "+str(last_date)
                     print(msg)
                     pokermsg.append(msg)
                 face_names.append(name)

         k+=1         
         process_this_frame = not process_this_frame
         for (top, right, bottom, left), name in zip(face_locations, face_names):
             top *= 4
             right *= 4
             bottom *= 4
             left *= 4
             cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)
             cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
             font = cv2.FONT_HERSHEY_DUPLEX
             cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
         cv2.imshow('Video', frame)
         print(k)
         if (cv2.waitKey(1) & 0xFF == ord('q')) or k==100:
               k=0
               print(k)
               break
     video_capture.release()
     cv2.destroyAllWindows()
     return f


imgname=""
last_case=""
last_link=""
last_case=""
last_date=""
msg=""
k=0
k=culprit_match()
pokermsg=list(set(pokermsg))
print("Deal")
print(imgname,last_case,last_link,last_date)
print(msg)
if k==1:
          print(msg)
          f=open("Speech21.vbs","w")
          k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+pokermsg[0]+'"'
          f.write(k)
          f.close()
          os.system("Speech21.vbs")
          account_sid = "AC5adda6db593a0f369a427283c8436959"
          auth_token = "fc647306d1cd37646ac0f1f23c55e612"
          client = Client(account_sid, auth_token)
          client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=pokermsg[0])
          print("Message Sent")
else:
          msg="Culprit Not Found. There are no criminal record of the current detected person."
          f=open("Speech21.vbs","w")
          k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
          f.write(k)
          f.close()
          os.system("Speech21.vbs")
          account_sid = "AC5adda6db593a0f369a427283c8436959"
          auth_token = "fc647306d1cd37646ac0f1f23c55e612"
          client = Client(account_sid, auth_token)
          client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg)
          print("Message Sent")


