import mysql.connector
from mysql.connector import Error
try:
    print("Try to connected to MySQL Server")
    connection = mysql.connector.connect(host='localhost',
                                         database='ArmoireConnecté',
                                         user="root",
                                         password="enzo")
    db_Info = connection.get_server_info()
    print("connected to MySQL Server version", db_Info)
except Error as e:
    print("Error while connecting to MySQL", e)

cursor = connection.cursor()
cursor.execute("select database();")
record = cursor.fetchone()
print("You are connected to database: ", record)

cursor = connection.cursor()
cursor.execute("show databases;")
records = cursor.fetchall()
print("Databases: ", records)

def insertion(role):
    try:
        mySql_insert_query = "INSERT INTO Rôle(Nom) VALUES('"+str(role)+"')"
        print(mySql_insert_query)
        cursor = connection.cursor()
        result = cursor.execute(mySql_insert_query)
        connection.commit()
        cursor.close()
    except mysql.connector.Error as error:
        print("Failed to insert record into table {}".format(error))
        return False
    return True

insertion("utilisateur")20