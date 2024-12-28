INSERT INTO office (office_id, name, location, contact_info) VALUES (1, 'Office 1', 'New York', 'contact1@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (2, 'Office 2', 'Los Angeles', 'contact2@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (3, 'Office 3', 'Chicago', 'contact3@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (4, 'Office 4', 'Houston', 'contact4@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (5, 'Office 5', 'Phoenix', 'contact5@example.com');

INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (1, 'Ford Focus', 'Black', 'Large', 2010, 'PLATE-001', 'RESERVED', 4, 
139.98);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (2, 'Honda Civic', 'Blue', 'Small', 2014, 'PLATE-002', 'RENTED', 3, 56.36);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (3, 'Chevrolet Malibu', 'Blue', 'Medium', 2005, 'PLATE-003', 'ACTIVE', 4, 146.8);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (4, 'Ford Focus', 'White', 'Medium', 2008, 'PLATE-004', 'ACTIVE', 3, 143.09);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (5, 'Ford Focus', 'Silver', 'Medium', 2015, 'PLATE-005', 'OUT OF SERVICE', 3, 122.18);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (6, 'Honda Civic', 'White', 'Small', 2006, 'PLATE-006', 'RESERVED', 3, 123.97);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (7, 'Tesla Model 3', 'White', 'Small', 2022, 'PLATE-007', 'OUT OF SERVICE', 4, 109.75);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (8, 'Toyota Corolla', 'Silver', 'Medium', 2001, 'PLATE-008', 'RESERVED', 3, 85.3);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (9, 'Tesla Model 3', 'Black', 'Small', 2012, 'PLATE-009', 'ACTIVE', 1, 141.31);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (10, 'Ford Focus', 'White', 'Small', 2010, 'PLATE-010', 'ACTIVE', 1, 65.92);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (11, 'Ford Focus', 'Blue', 'Small', 2009, 'PLATE-011', 'RESERVED', 3, 120.8);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (12, 'Chevrolet Malibu', 'White', 'Medium', 2005, 'PLATE-012', 'RESERVED', 2, 102.45);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (13, 'Ford Focus', 'Blue', 'Small', 2023, 'PLATE-013', 'RESERVED', 3, 75.24);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (14, 'Chevrolet Malibu', 'Red', 'Medium', 2017, 'PLATE-014', 'RESERVED', 1, 60.33);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (15, 'Chevrolet Malibu', 'Red', 'Small', 2022, 'PLATE-015', 'ACTIVE', 2, 90.44);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (16, 'Ford Focus', 'White', 'Large', 2020, 'PLATE-016', 'RESERVED', 2, 135.96);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (17, 'Toyota Corolla', 'Silver', 'Small', 2023, 'PLATE-017', 'RENTED', 1, 140.83);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (18, 'Chevrolet Malibu', 'Blue', 'Large', 2022, 'PLATE-018', 'RENTED', 5, 70.84);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (19, 'Honda Civic', 'Red', 'Large', 2022, 'PLATE-019', 'ACTIVE', 4, 95.32);
INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (20, 'Toyota Corolla', 'White', 'Medium', 2012, 'PLATE-020', 'RENTED', 5, 56.63);

INSERT INTO admin (admin_id, username, email, password) VALUES (1, 'admin1', 'admin1@admin.com', 'password1');
INSERT INTO admin (admin_id, username, email, password) VALUES (2, 'admin2', 'admin2@admin.com', 'password2');
INSERT INTO admin (admin_id, username, email, password) VALUES (3, 'admin3', 'admin3@admin.com', 'password3');

INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (1, 'John Doe', 'john_doe@example.com', '555-8946', '315 Main St', 'pass1');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (2, 'Jane Smith', 'jane_smith@example.com', '555-9546', '907 Main St', 'pass2');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (3, 'Alice Johnson', 'alice_johnson@example.com', '555-8636', '516 Main St', 'pass3');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (4, 'Bob Brown', 'bob_brown@example.com', '555-7141', '667 Main St', 'pass4');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (5, 'Charlie Davis', 'charlie_davis@example.com', '555-6108', '943 Main St', 'pass5');

INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (1, 2, 7, '2023-07-21 04:22:34', '2023-08-08 07:31:02', 'COMPLETED', 109.62);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (2, 5, 18, '2023-09-16 02:55:59', '2023-10-09 22:19:24', 'CONFIRMED', 137.54);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (3, 4, 5, '2023-11-26 11:53:02', '2023-11-28 05:39:57', 'CONFIRMED', 254.92);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (4, 4, 16, '2023-10-23 05:45:16', '2023-11-17 08:32:22', 'COMPLETED', 421.01);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (5, 4, 4, '2023-01-10 08:30:16', '2023-01-16 19:41:10', 'CANCELLED', 256.55);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (6, 5, 19, '2023-02-18 13:56:54', '2023-03-15 21:16:28', 'CANCELLED', 491.69);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (7, 5, 2, '2023-03-13 02:42:59', '2023-04-02 00:26:47', 'COMPLETED', 432.84);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (8, 5, 14, '2023-11-10 02:39:47', '2023-11-24 11:53:56', 'COMPLETED', 482.28);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (9, 2, 17, '2023-03-23 06:37:48', '2023-04-20 08:35:08', 'CONFIRMED', 212.9);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (10, 2, 18, '2023-08-27 16:52:09', '2023-09-09 10:27:13', 'COMPLETED', 156.37);        
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (11, 4, 4, '2023-06-19 15:42:47', '2023-07-12 13:45:32', 'COMPLETED', 467.11);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (12, 5, 8, '2023-02-03 13:21:43', '2023-03-02 08:35:36', 'CANCELLED', 106.89);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (13, 2, 7, '2023-01-05 08:49:25', '2023-01-16 01:02:24', 'CANCELLED', 284.61);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (14, 1, 5, '2023-08-11 13:39:46', '2023-08-30 06:33:35', 'COMPLETED', 331.81);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (15, 3, 17, '2023-03-03 07:09:14', '2023-03-31 23:10:59', 'CONFIRMED', 107.83); 

INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (1, 1, '2023-07-16 06:52:38', 426.04);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (2, 2, '2023-02-25 15:56:10', 323.38);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (3, 3, '2023-03-12 00:09:54', 489.72);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (4, 4, '2023-06-12 02:26:34', 301.03);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (5, 5, '2023-07-28 06:03:22', 121.66);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (6, 6, '2023-10-29 21:00:45', 481.66);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (7, 7, '2023-02-25 15:43:54', 111.35);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (8, 8, '2023-09-18 18:40:03', 269.91);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (9, 9, '2023-03-14 01:37:06', 422.92);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (10, 10, '2023-08-27 15:56:42', 410.96);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (11, 11, '2023-07-12 21:40:39', 230.11);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (12, 12, '2023-03-10 02:28:07', 460.54);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (13, 13, '2023-05-08 16:33:19', 393.49);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (14, 14, '2023-12-13 03:31:47', 387.53);
INSERT INTO payment (payment_id, reservation_id, payment_date, amount) VALUES (15, 15, '2023-04-11 22:01:30', 367.63);