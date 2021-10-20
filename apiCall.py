import requests,json;
import mysql.connector;

cnx = mysql.connector.connect(user='vishal', password='123',
                              host='localhost',
                              database='projectDB')
cursor = cnx.cursor()

yearsUrl = 'https://api.nhtsa.gov/products/vehicle/modelYears?issueType=r';
yearsRequest = requests.get(yearsUrl);


yearsJson = json.loads(yearsRequest.text);


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
            modelString = models['model']
            print(models['model'])

            recallUrl = "https://api.nhtsa.gov/recalls/recallsByVehicle?make=" + makeString + "&model=" + modelString + "&modelYear=" + yearString
            recallRequest = requests.get(recallUrl)
            recallJson = json.loads(recallRequest.text)
            for recalls in recallJson['results']:
                recallString = recalls['Summary']
                print(recallString)
                try:
                    query = ("INSERT INTO carRecalls VALUES (%s, %s, %s, %s)")
                    cursor.execute(query, (makeString, modelString, yearString, recallString))
                except:
                    print("Couldn't put value in")






cursor.close()
cnx.close()

