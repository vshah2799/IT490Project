import requests,json;
import mysql.connector;

cnx = mysql.connector.connect(user='test', password='',
                              host='127.0.0.1',
                              database='projectDB')
cursor = cnx.cursor()


for years in range(10):
    print(years+2010)
    yearString = str(years + 2000)
    try:
        makesUrl = 'https://api.nhtsa.gov/products/vehicle/makes?modelYear=' + yearString + '&issueType=r'
        makesRequest = requests.get(makesUrl)
        makesJson = json.loads(makesRequest.text)
    except:
        print("Error at years")
        continue
    for makes in makesJson['results']:
        print("MAKES")
        try:
            makeString = str(makes['make'])
            modelUrl = 'https://api.nhtsa.gov/products/vehicle/models?modelYear=' + yearString + '&make=' + makeString + '&issueType=r'
            modelRequest = requests.get(modelUrl)
            modelJson = json.loads(modelRequest.text)
        except:
            print("Error at makes")
            continue
        for models in modelJson['results']:
            print("MODELS")
            try:
                modelString = models['model']
                recallUrl = "https://api.nhtsa.gov/recalls/recallsByVehicle?make=" + makeString + "&model=" + modelString + "&modelYear=" + yearString
                recallRequest = requests.get(recallUrl)
                recallJson = json.loads(recallRequest.text)
            except:
                print("Error at models")
                continue
            for recalls in recallJson['results']:
                print("RECALLS")
                recallString = recalls['Summary']
                try:
                   ## INSERT INTO carRecalls (`make`, `model`, `year`, `recallTest`) VALUES ("Honda", "Accord", "20                   ## 18", "Test");
                    ##query = ("INSERT INTO carRecalls (`make`, `model`, `year`, `recallTest`) VALUES ("%s", "%s", "%s", "%s")")
                    queryString = ("INSERT INTO carRecalls(make, model, year, recallTest) "
               "VALUES(%s, %s, %s, %s)")
                    cursor.execute(queryString, (makeString, modelString, yearString, recallString))
                except:
                    print("Couldn't put value in")






cursor.close()
cnx.close()

