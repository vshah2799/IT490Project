import requests,json;
yearsUrl = 'https://api.nhtsa.gov/products/vehicle/modelYears?issueType=r';
yearsRequest = requests.get(yearsUrl);

##Turns r into json
yearsJson = json.loads(yearsRequest.text);
##Goes through x and gets every model year
for years in yearsJson['results']:
    print(years['modelYear'])
    yearString = str(years['modelYear'])
    makesUrl = 'https://api.nhtsa.gov/products/vehicle/makes?modelYear=' + yearString + '&issueType=r'
    makesRequest = requests.get(makesUrl)
    makesJson = json.loads(makesRequest.text)
    ##print(makesJson['make'])
    for makes in makesJson['results']:
       ## print(makes['make'])
        makeString = str(makes['make'])
        modelUrl = 'https://api.nhtsa.gov/products/vehicle/models?modelYear=' + yearString + '&make=' + makeString + '&issueType=r'
        modelRequest = requests.get(modelUrl)
        modelJson = json.loads(modelRequest.text)
        for models in modelJson['results']:
            print(models['model'])

