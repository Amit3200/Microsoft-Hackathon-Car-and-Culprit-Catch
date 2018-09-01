import requests
import json

def ocr_space_file(filename, overlay=False, api_key='38b83ba54188957', language='eng'):
    """ OCR.space API request with local file.
        Python3.5 - not tested on 2.7
    :param filename: Your file path & name.
    :param overlay: Is OCR.space overlay required in your response.
                    Defaults to False.
    :param api_key: OCR.space API key.
                    Defaults to 'helloworld'.
    :param language: Language code to be used in OCR.
                    List of available language codes can be found on https://ocr.space/OCRAPI
                    Defaults to 'en'.
    :return: Result in JSON format.
    """
    #print("check")
    payload = {'isOverlayRequired': overlay,
               'apikey': api_key,
               'language': language,
               }
    #print("check1")
    with open(filename, 'rb') as f:
        r = requests.post('https://api.ocr.space/parse/image',files={filename: f},data=payload,)
        print(r)
        k=r.json()
        print(k["ParsedResults"][0]['ParsedText'])
        f=k["ParsedResults"][0]['ParsedText']
    #return r.content.decode()
    return k,f


def ocr_space_url(url, overlay=False, api_key='38b83ba54188957', language='eng'):
    """ OCR.space API request with remote file.
        Python3.5 - not tested on 2.7
    :param url: Image url.
    :param overlay: Is OCR.space overlay required in your response.
                    Defaults to False.
    :param api_key: OCR.space API key.
                    Defaults to 'helloworld'.
    :param language: Language code to be used in OCR.
                    List of available language codes can be found on https://ocr.space/OCRAPI
                    Defaults to 'en'.
    :return: Result in JSON format.
    """

    payload = {'url': url,
               'isOverlayRequired': overlay,
               'apikey': api_key,
               'language': language,
               }
    r = requests.post('https://api.ocr.space/parse/image',
                      data=payload,
                      )
    return r.content.decode()


# Use examples:
#test_file,d = ocr_space_file(filename='121.jpg', language='pol')
#test_url = ocr_space_url(url='final.png')
#print(d)
