import matplotlib.pyplot as plt
import MySQLdb
import matplotlib
fig = plt.figure()
db=MySQLdb.connect(host="localhost",user="root",password="amit",db="rajasthan")
cur=db.cursor()
query="select balance,vehicle from pays";
cur.execute(query)
x=[]
y=[]
for row in cur:
    print(row)
    x.append(row[0])
    y.append(row[1])
plt.xlabel("Vehicle Number")
plt.ylabel("Total Price")
plt.title("Total Cost V/s Total Vehicles")
plt.bar(y,x)
plt.draw()
plt.savefig('data1.png')
plt.show()
