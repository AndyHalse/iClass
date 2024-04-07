import sqlite3
import json

# Connect to your SQLite database
conn = sqlite3.connect('your_database.db')

# Cursor to execute query
cur = conn.cursor()

# Dictionary to hold the data
data = {
    'Members': [],
    'Classes': [],
    'Bookings': [],
    'Attendance': []
}

# Query the Members table
cur.execute("SELECT * FROM Members")
rows = cur.fetchall()
for row in rows:
    data['Members'].append({
        'MemberID': row[0],
        'Name': row[1],
        'Email': row[2],
        'Phone': row[3]
    })

# Query the Classes table
cur.execute("SELECT * FROM Classes")
rows = cur.fetchall()
for row in rows:
    data['Classes'].append({
        'ClassID': row[0],
        'ClassName': row[1],
        'Schedule': row[2],
        'TeacherID': row[3],
        'MaxCapacity': row[4]
    })

# Query the Bookings table
cur.execute("SELECT * FROM Bookings")
rows = cur.fetchall()
for row in rows:
    data['Bookings'].append({
        'BookingID': row[0],
        'MemberID': row[1],
        'ClassID': row[2],
        'BookingTime': row[3]
    })

# Query the Attendance table
cur.execute("SELECT * FROM Attendance")
rows = cur.fetchall()
for row in rows:
    data['Attendance'].append({
        'AttendanceID': row[0],
        'BookingID': row[1],
        'ArrivalTime': row[2]
    })

# Convert to JSON
json_data = json.dumps(data, indent=4)

# Write to a .json file
with open('database_export.json', 'w') as json_file:
    json_file.write(json_data)

# Close the connection
conn.close()
