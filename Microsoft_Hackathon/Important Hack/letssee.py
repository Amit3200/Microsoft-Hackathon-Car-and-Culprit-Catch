from asprise_ocr_api import *

Ocr.set_up()
ocrEngine=Ocr()
ocrEngine.start_engine("eng")
s=ocrEngine.recognize("XAO.png",-1,-1,-1,-1,-1,OCR_RECOGNIZE_TYPE_ALL,OCR_OUTPUT_FORMAT_PLAINTEXT)
print("Result ->"+s)
ocrEngine.stop_engine()
