import random
from datetime import datetime, timedelta

# Data for generation
car_models = ["Toyota Corolla", "Honda Civic", "Ford Focus", "Tesla Model 3", "Chevrolet Malibu"]
car_colors = ["Red", "Blue", "Black", "White", "Silver"]
car_sizes = ["Small", "Medium", "Large"]
statuses = ["ACTIVE", "OUT OF SERVICE", "RENTED"]
locations = ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix"]
names = ["John Doe", "Jane Smith", "Alice Johnson", "Bob Brown", "Charlie Davis"]
admin_names = ["Admin1", "Admin2", "Admin3"]

# Helper function to generate random datetime
def random_datetime(start, end):
    delta = end - start
    random_seconds = random.randint(0, int(delta.total_seconds()))
    return start + timedelta(seconds=random_seconds)

# Helper function to generate a simple password
def generate_simple_password():
    return "".join(random.choices("abcdef123456", k=6))

# Generate SQL commands
def generate_sql():
    sql_commands = []

    # Office entries
    sql_commands.append("-- Office Entries")
    for office_id, location in enumerate(locations, start=1):
        name = f"Office {office_id}"
        contact_info = f"contact{office_id}@example.com"
        sql_commands.append(f"INSERT INTO office (office_id, name, location, contact_info) VALUES ({office_id}, '{name}', '{location}', '{contact_info}');")

    # Car entries
    sql_commands.append("-- Car Entries")
    for car_id in range(1, 21):
        model = random.choice(car_models)
        color = random.choice(car_colors)
        size = random.choice(car_sizes)
        year = random.randint(2000, 2023)
        plate_id = f"PLATE-{car_id:03}"
        status = random.choice(statuses)
        office_id = random.randint(1, len(locations))
        price_per_day = round(random.uniform(50.0, 150.0), 2)
        sql_commands.append(f"INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES ({car_id}, '{model}', '{color}', '{size}', {year}, '{plate_id}', '{status}', {office_id}, {price_per_day});")

    # Customer entries
    sql_commands.append("-- Customer Entries")
    for customer_id, name in enumerate(names, start=1):
        email = name.lower().replace(" ", "_") + "@example.com"
        phone = f"555-{random.randint(1000, 9999)}"
        address = f"{random.randint(100, 999)} Main St"
        password = generate_simple_password()
        sql_commands.append(f"INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES ({customer_id}, '{name}', '{email}', '{phone}', '{address}', '{password}');")

    # Admin entries
    sql_commands.append("-- Admin Entries")
    for admin_id, admin_name in enumerate(admin_names, start=1):
        username = admin_name.lower()
        email = f"{username}@admin.com"
        password = generate_simple_password()
        sql_commands.append(f"INSERT INTO admin (admin_id, username, email, password) VALUES ({admin_id}, '{username}', '{email}', '{password}');")

    # Reservation entries
    sql_commands.append("-- Reservation Entries")
    start_date_range = datetime(2023, 1, 1)
    end_date_range = datetime(2024, 1, 1)
    for reservation_id in range(1, 16):
        customer_id = random.randint(1, len(names))
        car_id = random.randint(1, 20)
        start_date = random_datetime(start_date_range, end_date_range - timedelta(days=30))
        end_date = random_datetime(start_date + timedelta(days=1), start_date + timedelta(days=30))
        sql_commands.append(f"INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date) VALUES ({reservation_id}, {customer_id}, {car_id}, '{start_date.strftime('%Y-%m-%d %H:%M:%S')}', '{end_date.strftime('%Y-%m-%d %H:%M:%S')}');")

    # Payment entries
    sql_commands.append("-- Payment Entries")
    for payment_id in range(1, 16):
        reservation_id = payment_id
        payment_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        amount = round(random.uniform(100.0, 500.0), 2)
        card_id = f"{random.randint(1000000000000000, 9999999999999999)}"
        card_cvv = f"{random.randint(100, 999)}"
        sql_commands.append(f"INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES ({payment_id}, {reservation_id}, '{payment_date}', {amount}, '{card_id}', '{card_cvv}');")

    # Pickup entries
    sql_commands.append("-- Pickup Entries")
    for pickup_id in range(1, 16):
        reservation_id = pickup_id
        pickup_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        pickup_location_id = random.randint(1, len(locations))
        sql_commands.append(f"INSERT INTO pickup (pickup_id, reservation_id, pickup_date, pickup_location_id) VALUES ({pickup_id}, {reservation_id}, '{pickup_date}', {pickup_location_id});")

    # Return entries
    sql_commands.append("-- Return Entries")
    for return_id in range(1, 16):
        reservation_id = return_id
        return_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        return_location_id = random.randint(1, len(locations))
        sql_commands.append(f"INSERT INTO `return` (return_id, reservation_id, return_date, return_location_id) VALUES ({return_id}, {reservation_id}, '{return_date}', {return_location_id});")

    return sql_commands

# Generate and print SQL commands
sql_statements = generate_sql()
print("\n".join(sql_statements))
