import requests,json;
import mysql.connector
from mysql.connector import Error

conn = None
try:
    conn = mysql.connector.connect(host='localhost',
                                    database='projectDB',
                                    user='vishal',
                                    password='123')
    if conn.is_connected():
        print('Connected to MySQL database')

except Error as e:
    print(e)

cursor = conn.cursor()

for years in range(1):
    print(years+2001)
    yearString = str(years + 2001)
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
            count = "1"
            for recalls in recallJson['results']:
                print("RECALLS")
                recallString = recalls['Summary']
                try:
                    query = ("INSERT INTO carRecalls(make, model, year, recallText) VALUES(%s, %s, %s, %s)")
                    cursor.execute(query, (makeString, modelString, yearString, recallString))
                    conn.commit()
                except:
                    print("NOT IN DB")





cursor.close()


