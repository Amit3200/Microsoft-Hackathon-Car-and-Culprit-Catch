import cv2
import numpy as np
import pytesseract
#import argparse
#import os
#import urllib
from PIL import Image
#from google.cloud import vision
#from google.cloud.vision import types
import stringOCR
import FrameDivide
import os
from twilio.rest import Client
match=FrameDivide.frame()
if(match==True):
    i=0
    if i==12:
        print("Possible")
    while(True):
        try:
            img= cv2.imread('frame'+str(i)+".jpg")
            #cv2.namedWindow('Original Image',cv2.WINDOW_NORMAL)
            #cv2.imshow('Original Image',img)

            img_gray = cv2.cvtColor(img,cv2.COLOR_RGB2GRAY)
            #cv2.namedWindow('Gray Converted Image',cv2.WINDOW_NORMAL)
            #cv2.imshow('Gray converted Image',img_gray)

            noise_removal=cv2.bilateralFilter(img_gray,9,75,75)
            #cv2.namedWindow('Noise Removed image',cv2.WINDOW_NORMAL)
            #cv2.imshow('Noise removed image',noise_removal)

            equal_histogram = cv2.equalizeHist(noise_removal)
            #cv2.namedWindow('After histogram ',cv2.WINDOW_NORMAL)
            #cv2.imshow('After histogram',equal_histogram)

            kernel= cv2.getStructuringElement(cv2.MORPH_RECT,(5,5))
            morph_image=cv2.morphologyEx(equal_histogram,cv2.MORPH_OPEN,kernel,iterations=15)
            #cv2.namedWindow("Morphological opening", cv2.WINDOW_NORMAL)
            #cv2.imshow("Morphological opening",morph_image)

            sub_morph_image=cv2.subtract(equal_histogram,morph_image)
            #cv2.namedWindow("Subtraction image",cv2.WINDOW_NORMAL)
            #cv2.imshow("Subtract image",sub_morph_image)

            ret,thresh_image=cv2.threshold(sub_morph_image,0,255,cv2.THRESH_OTSU)
            #cv2.namedWindow("Image after thresholding",cv2.WINDOW_NORMAL)
            #cv2.imshow("Image after thresholding",thresh_image)

            canny_image= cv2.Canny(thresh_image,250,255)
            #cv2.namedWindow("Image after applying canny",cv2.WINDOW_NORMAL)
            canny_image= cv2.convertScaleAbs(canny_image)

            kernel=np.ones((3,3),np.uint8)
            dilated_image=cv2.dilate(canny_image,kernel,iterations=1)
            #cv2.namedWindow("Dilation",cv2.WINDOW_NORMAL)
            #cv2.imshow("Dilation",dilated_image)

            new,contours,hierarchy =cv2.findContours(dilated_image,cv2.RETR_TREE,cv2.CHAIN_APPROX_SIMPLE)
            contours=sorted(contours,key =cv2.contourArea, reverse = True)[:10]
            screenCnt = None
            for c in contours:
                peri = cv2.arcLength(c,True)
                approx =cv2.approxPolyDP(c,0.06*peri,True)
                if len(approx)==4:
                    screenCnt = approx
                    break
            final=cv2.drawContours(img,[screenCnt],-1,(0,255,0),3)
            #cv2.namedWindow("Image with selected contour",cv2.WINDOW_NORMAL)
            #cv2.imshow("Image with selected contour",final)

            mask=np.zeros(img_gray.shape,np.uint8)
            new_image=cv2.drawContours(mask,[screenCnt],0,255,-1)
            new_image=cv2.bitwise_and(img,img,mask=mask)
            #cv2.namedWindow("Final Image,",cv2.WINDOW_NORMAL)
            #cv2.imshow("Final_image",new_image)

            y,cr,cb = cv2.split(cv2.cvtColor(new_image,cv2.COLOR_RGB2YCrCb))
            y=cv2.equalizeHist(y)
            final_image=cv2.cvtColor(cv2.merge([y,cr,cb]),cv2.COLOR_YCrCb2RGB)
            #cv2.namedWindow("Enhanced Number Plate",cv2.WINDOW_NORMAL)
            #cv2.imshow("Enhanced Number plate",final_image)
            cv2.imwrite('final.png',final_image)
            test_file,d =stringOCR.ocr_space_file(filename='final.png', language='pol')
            print(d)
            
            if "JCU 235" in d or "JCU" in d or "235" in d or "JC" in d or "U" in d:
                #os.system("Cars.mp4")
                cv2.namedWindow("Enhanced Number Plate",cv2.WINDOW_NORMAL)
                cv2.imshow("Enhanced Number plate",final_image)
                print("Found")
                msg="Your Vehicle Found with the number plate"
                f=open("Speech1.vbs","w")
                k="Dim sapi \nSet sapi=Createobject(\"sapi.spvoice\") \nsapi.Speak "+'"'+msg+'"'
                f.write(k)
                f.close()
                os.system("Speech1.vbs")
                msg="Your Vehicle with the number plate "+d+" Found. Contact AABBCC Toll Tax Soon"
                account_sid = "AC5adda6db593a0f369a427283c8436959"
                auth_token = "fc647306d1cd37646ac0f1f23c55e612"
                client = Client(account_sid, auth_token)
                client.api.account.messages.create(to="+13153538299",from_="+13153229683",body=msg)
                print("Message Sent")
                break
                break
            else:
                i+=3
                print("Not Found")
            if i==69:
                break
            """

            client=vision.ImageAnnotatorClient()

            with io.open(final_image,'rb') as image_file:
                content=image_file.read()
            image=types.Image(content=content)
            response =client.text_detection(image=image)
            texts=response.text_annotations
            print('Texts:')

            for text in texts:
                print('\n"{}"'.format(text.description))

                vetices =(['({},{})'.format(vertex.x, vertex.y)
                           for vertex in text.bounding_poly.vertices])
                


            """
            """ap=argparse.ArgumentParser()
            ap.add_argument('-i',"--image",required=True, help="path to input image to be OCR'd")
            ap.add_argument("-p","--preprocess", type=str,default="thresh",
                            help ="type of preprocessing to be done")
            agrs =vars(ap.parse_args())


            image=final_image
            gray=cv2.cvtColor(image,cv2.COLOR_BGR2GRAY)
            if args["preprocess"]=="thresh":
                gray = cv2.threshold(gray,0,255,cv2.THRESH_BINARY |cv2.THRESH_OTSU)[1]
            elif args["preprocess"]=="blur":
                gray=cv2.medianBlur(gray,3)
            filename="{}.png".format(os.getpid())
            cv2.imwrite(file.txt,gray)
                
            """
            cv2.waitKey()
        except:
            pass
            
for i in range(20):
    os.remove("frame"+str(i)+".jpg")
os.remove("final.png")
