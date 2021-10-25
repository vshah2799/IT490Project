import requests,json;
import mysql.connector
from mysql.connector import Error
from python_mysql_dbconfig import read_db_config

db_config = read_db_config()

conn = None
try:
    conn = mysql.connector.connect(**db_config)
    if conn.is_connected():
        print('Connected to MySQL database')

except Error as e:
    print(e)

cursor = conn.cursor()
cursor.close()
