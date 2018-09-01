import http.client, urllib.request, urllib.parse, urllib.error, base64
import requests
image_url = "images/12345.jpg"
headers  = {'Ocp-Apim-Subscription-Key': '9afd3cc54ff242bb88694a47931e8198'}
params   = {'language': 'unk', 'detectOrientation ': 'true'}
data     = {'url': image_url}
ocr_url ="https://southeastasia.api.cognitive.microsoft.com/vision/v1.0/ocr?language=en&detectOrientation =true"
response = requests.post(ocr_url, headers=headers, params=params, json=data)
response.raise_for_status()

analysis = response.json()
