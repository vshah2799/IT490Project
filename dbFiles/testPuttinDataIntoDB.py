import mysql.connector
from mysql.connector import Error

""" Connect to MySQL database """
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


query = ("INSERT INTO carRecalls(make, model, year) VALUES(%s, %s, %s)")
cursor.execute(query, ("Test", "test", "9995"))
conn.commit()



print(cursor.execute("SELECT * FROM carRecalls"))

