import json
from faker import Faker

# Load your existing JSON file
with open('class_rosters.json', 'r') as file:
    class_rosters = json.load(file)

# Initialize Faker and generate random names for new classes
faker = Faker()
new_classes = ["Water Fitness", "Reformer Pilates", "Beginners Reformer", "Boot Camp"]
for new_class in new_classes:
    class_rosters[new_class] = [faker.name() for _ in range(20)]

# Save the updated class rosters back to the JSON file
with open('class_rosters.json', 'w') as file:
    json.dump(class_rosters, file, indent=4)
