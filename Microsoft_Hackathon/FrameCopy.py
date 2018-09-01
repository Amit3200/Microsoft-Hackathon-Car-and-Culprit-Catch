import numpy as np
import cv2
def frame():
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
        cv2.imshow('frame',frame)
        if cv2.waitKey(1) & 0xFF == ord('q'):
            break
        return True

        # When everything done, release the capture
        cap.release()
        cv2.destroyAllWindows()
