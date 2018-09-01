import numpy as np
import cv2
import time
cap = cv2.VideoCapture(0)
count=0
car_cascade = cv2.CascadeClassifier('cars.xml')
count=0
while(True):
    # Capture frame-by-frame
    ret, frame = cap.read()

    # Our operations on the frame come here
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    print('Read a new frame: ', True)
    cv2.imwrite("livecam%d.jpg" % count, frame)     # save frame as JPEG file
    count += 1
    grayvideo = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    cars = car_cascade.detectMultiScale(grayvideo, 1.1, 1)
    for (x,y,w,h) in cars:
         cv2.rectangle(frame,(x,y),(x+w,y+h),(0,0,255),2)
         time.sleep(1)
    # Display the resulting frame
    cv2.imshow('livecam',frame)
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# When everything done, release the capture
cap.release()
cv2.destroyAllWindows()
