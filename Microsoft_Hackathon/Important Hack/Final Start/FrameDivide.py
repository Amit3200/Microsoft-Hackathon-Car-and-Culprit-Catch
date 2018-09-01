import numpy as np
import cv2
import time
def frame():
  vidcap = cv2.VideoCapture('Cars.mp4')
  success,image = vidcap.read()
  count = 0
  success = True
  k=0
  while True:
    if k%5==0:
      while success:
        success,image = vidcap.read()
        print('Read a new frame: ', success)
        cv2.imwrite("frame%d.jpg" % count, image)     # save frame as JPEG file
        count += 1
        if count==70:
          success=False
          break
    if k==100:
      break
    k+=1
    return True



def frame1():
    cap = cv2.VideoCapture(0)
    count=0
    k=0
    success = True
    while(True):
        if k%5==0:
          while success:
            # Capture frame-by-frame
            ret, frame = cap.read()
            # Our operations on the frame come here
            gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
            cv2.imshow('frame',frame)
            print('Read a new frame: ', True)
            cv2.imwrite("frame%d.jpg" % count, frame)     # save frame as JPEG file
            count += 1
            if count==20:
              success=False
              break
        if k==100:
          break
        k+=1
       # Display the resulting frame
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break
        return True

        # When everything done, release the capture
        cap.release()
        cv2.destroyAllWindows()
