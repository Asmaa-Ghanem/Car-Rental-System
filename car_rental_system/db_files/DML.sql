INSERT INTO office (office_id, name, location, contact_info) VALUES (1, 'Office 1', 'New York', 'contact1@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (2, 'Office 2', 'Los Angeles', 'contact2@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (3, 'Office 3', 'Chicago', 'contact3@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (4, 'Office 4', 'Houston', 'contact4@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (5, 'Office 5', 'Phoenix', 'contact5@example.com');

INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) VALUES (1, 'Ford Focus', 'Black', 'Large', 2010, 'PLATE-001', 'RESERVED', 4, 139.98);
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

INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (1, 2, 17, '2024-12-20 09:11:14', '2024-12-25 22:58:46', 456.33);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (2, 1, 6, '2024-12-24 03:50:02', '2024-12-31 11:04:27', 427.81);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (3, 5, 10, '2025-01-09 04:12:00', '2025-01-17 21:35:06', 138.82);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (4, 4, 17, '2024-12-22 14:27:24', '2024-12-25 16:25:12', 336.53);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (5, 2, 11, '2025-01-15 00:59:59', '2025-01-20 03:06:39', 440.61);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (6, 5, 9, '2024-12-07 09:05:08', '2024-12-12 01:57:25', 373.41);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (7, 4, 6, '2024-12-18 19:04:06', '2024-12-22 12:53:30', 258.09);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (8, 1, 7, '2024-12-09 13:23:48', '2024-12-14 00:06:01', 289.52);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (9, 3, 2, '2025-01-04 03:16:33', '2025-01-08 08:18:58', 354.6);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (10, 3, 1, '2025-01-02 17:11:53', '2025-01-05 11:47:22', 386.34);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (11, 2, 18, '2025-01-21 21:26:05', '2025-01-27 13:16:42', 473.44);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (12, 4, 10, '2025-01-19 12:17:23', '2025-01-22 20:14:51', 122.1);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (13, 5, 7, '2025-01-11 16:28:57', '2025-01-17 03:20:57', 193.24);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (14, 3, 10, '2024-12-12 23:05:50', '2024-12-20 03:30:28', 340.94);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, payment_amount) VALUES (15, 1, 10, '2025-01-06 06:37:26', '2025-01-10 04:46:20', 132.49); 

INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (1, 1, '2023-07-16 06:52:38', 456.33, '0503844475229085', '186');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (2, 2, '2023-02-25 15:56:10', 427.81, '9558370446991615', '753');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (3, 3, '2023-03-12 00:09:54', 140.00, '2506811744495805', '870');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (4, 4, '2023-06-12 02:26:34', 350.00, '4349059042929826', '722');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (5, 5, '2023-07-28 06:03:22', 440.61, '9251557546865420', '248');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (6, 6, '2023-10-29 21:00:45', 373.41, '7894601672423960', '824');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (7, 7, '2023-02-25 15:43:54', 259.00, '4399398235948349', '121');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (8, 8, '2023-09-18 18:40:03', 290.00, '8886438207193380', '656');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (9, 9, '2023-03-14 01:37:06', 422.92, '1781031229674239', '753');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (10, 10, '2023-08-27 15:56:42', 386.34, '2545619806302416', '429');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (11, 11, '2023-07-12 21:40:39', 480.00, '8889105751430688', '498');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (12, 12, '2023-03-10 02:28:07', 460.54, '6460472429725067', '258');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (13, 13, '2023-05-08 16:33:19', 393.49, '0659346159766241', '949');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (14, 14, '2023-12-13 03:31:47', 387.53, '2091919602448637', '323');
INSERT INTO payment (payment_id, reservation_id, payment_date, amount, card_id, card_cvv) VALUES (15, 15, '2023-04-11 22:01:30', 367.63, '9558376259479587', '998');