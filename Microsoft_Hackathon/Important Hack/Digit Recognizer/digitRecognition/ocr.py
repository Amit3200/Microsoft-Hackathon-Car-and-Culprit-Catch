import cv2
import tesserocr as tr
from PIL import Image
import numpy as np

img = cv2.imread('photo_5.jpg')

idx = 0

# since tesserocr accepts PIL images, converting opencv image to pil
pil_img = Image.fromarray(cv2.cvtColor(img, cv2.COLOR_BGR2RGB))

# initialize api
api = tr.PyTessBaseAPI()

alphabet_min = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
                'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']

alphabet_max = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
                'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']

t = 0
try:
    api.SetImage(pil_img)
    boxes = api.GetComponentImages(tr.RIL.SYMBOL, True)
    text = api.GetUTF8Text()

    for (im, box, _, _) in boxes:
        x, y, w, h = box['x'], box['y'], box['w'], box['h']
        cv2.rectangle(img, (x, y), (x + w, y + h), color=(0, 255, 0), thickness=1)

        print(text[t])

        for letter in alphabet_min:
            if text[t] in letter:
                cv2.rectangle(img, (x, y), (x + w, y + h), color=(0, 255, 0), thickness=-1)

        t += 1
        cv2.imshow('2', img)
        cv2.waitKey(0)


    idx += 1


finally:
    api.End()
