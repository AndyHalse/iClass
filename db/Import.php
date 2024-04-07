import json
import pandas as pd

# Load JSON data
with open('class_rosters.json', 'r') as file:
    class_rosters = json.load(file)

# Prepare data for Excel
data = []
for class_name, members in class_rosters.items():
    for member in members:
        first_name, last_name = member.split(' ', 1)
        data.append([first_name, last_name, class_name])

# Create DataFrame and write to Excel
df = pd.DataFrame(data, columns=['FirstName', 'LastName', 'ClassName'])
df.to_excel('Pupil.xlsx', index=False)
ß