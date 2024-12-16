import random
from datetime import datetime, timedelta

# Generate random data
car_models = ["Toyota Corolla", "Honda Civic", "Ford Focus", "Tesla Model 3", "Chevrolet Malibu"]
statuses = ["ACTIVE", "OUT OF SERVICE", "RENTED", "RESERVED"]
locations = ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix"]
names = ["John Doe", "Jane Smith", "Alice Johnson", "Bob Brown", "Charlie Davis"]

# Helper function to generate random datetime
def random_datetime(start, end):
    delta = end - start
    random_seconds = random.randint(0, delta.total_seconds())
    return start + timedelta(seconds=random_seconds)

# Generate SQL commands
def generate_sql():
    sql_commands = []

    # CREATE commands
    sql_commands.append("CREATE DATABASE car_rental_system;")
    sql_commands.append("USE car_rental_system;")

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
        year = random.randint(2000, 2023)
        plate_id = f"PLATE-{car_id:03}"
        status = random.choice(statuses)
        office_id = random.randint(1, len(locations))
        sql_commands.append(f"INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES ({car_id}, '{model}', {year}, '{plate_id}', '{status}', {office_id});")

    # Customer entries
    sql_commands.append("-- Customer Entries")
    for customer_id, name in enumerate(names, start=1):
        email = name.lower().replace(" ", "_") + "@example.com"
        phone = f"555-{random.randint(1000, 9999)}"
        address = f"{random.randint(100, 999)} Main St"
        sql_commands.append(f"INSERT INTO customer (customer_id, name, email, phone, address) VALUES ({customer_id}, '{name}', '{email}', '{phone}', '{address}');")

    # Reservation entries
    sql_commands.append("-- Reservation Entries")
    start_date_range = datetime(2023, 1, 1)
    end_date_range = datetime(2024, 1, 1)
    for reservation_id in range(1, 16):
        customer_id = random.randint(1, len(names))
        car_id = random.randint(1, 20)
        start_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        end_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        status = random.choice(["CONFIRMED", "CANCELLED", "COMPLETED"])
        payment_amount = round(random.uniform(100.0, 500.0), 2)
        sql_commands.append(f"INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES ({reservation_id}, {customer_id}, {car_id}, '{start_date}', '{end_date}', '{status}', {payment_amount});")

    # Payment entries
    sql_commands.append("-- Payment Entries")
    for payment_id in range(1, 16):
        reservation_id = payment_id
        payment_date = random_datetime(start_date_range, end_date_range).strftime("%Y-%m-%d %H:%M:%S")
        amount = round(random.uniform(100.0, 500.0), 2)
        sql_commands.append(f"INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES ({payment_id}, {reservation_id}, '{payment_date}', {amount});")

    return sql_commands

# Generate and print SQL commands
sql_statements = generate_sql()
print("\n".join(sql_statements))
