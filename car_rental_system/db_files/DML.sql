INSERT INTO office (office_id, name, location, contact_info) VALUES (1, 'Office 1', 'New York', 'contact1@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (2, 'Office 2', 'Los Angeles', 'contact2@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (3, 'Office 3', 'Chicago', 'contact3@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (4, 'Office 4', 'Houston', 'contact4@example.com');
INSERT INTO office (office_id, name, location, contact_info) VALUES (5, 'Office 5', 'Phoenix', 'contact5@example.com');

INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (1, 'Toyota Corolla', 2009, 'PLATE-001', 'RESERVED', 1);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (2, 'Toyota Corolla', 2005, 'PLATE-002', 'ACTIVE', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (3, 'Tesla Model 3', 2008, 'PLATE-003', 'RENTED', 1);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (4, 'Ford Focus', 2013, 'PLATE-004', 'RESERVED', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (5, 'Ford Focus', 2015, 'PLATE-005', 'RENTED', 5);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (6, 'Tesla Model 3', 2003, 'PLATE-006', 'OUT OF SERVICE', 5);    
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (7, 'Honda Civic', 2006, 'PLATE-007', 'OUT OF SERVICE', 2);      
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (8, 'Ford Focus', 2022, 'PLATE-008', 'ACTIVE', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (9, 'Honda Civic', 2007, 'PLATE-009', 'RESERVED', 3);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (10, 'Chevrolet Malibu', 2018, 'PLATE-010', 'OUT OF SERVICE', 4);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (11, 'Ford Focus', 2020, 'PLATE-011', 'OUT OF SERVICE', 1);      
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (12, 'Tesla Model 3', 2016, 'PLATE-012', 'RENTED', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (13, 'Toyota Corolla', 2015, 'PLATE-013', 'ACTIVE', 5);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (14, 'Ford Focus', 2010, 'PLATE-014', 'RESERVED', 5);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (15, 'Toyota Corolla', 2022, 'PLATE-015', 'ACTIVE', 5);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (16, 'Tesla Model 3', 2008, 'PLATE-016', 'OUT OF SERVICE', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (17, 'Ford Focus', 2011, 'PLATE-017', 'ACTIVE', 2);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (18, 'Honda Civic', 2007, 'PLATE-018', 'RENTED', 4);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (19, 'Toyota Corolla', 2004, 'PLATE-019', 'OUT OF SERVICE', 5);
INSERT INTO car (car_id, model, year, plate_id, status, office_id) VALUES (20, 'Honda Civic', 2017, 'PLATE-020', 'RENTED', 1);

INSERT INTO admin (admin_id, username, email, password) VALUES (1, 'admin1', 'admin1@admin.com', 'password1');
INSERT INTO admin (admin_id, username, email, password) VALUES (2, 'admin2', 'admin2@admin.com', 'password2');
INSERT INTO admin (admin_id, username, email, password) VALUES (3, 'admin3', 'admin3@admin.com', 'password3');

INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (1, 'John Doe', 'john_doe@example.com', '555-8946', '315 Main St', 'pass1');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (2, 'Jane Smith', 'jane_smith@example.com', '555-9546', '907 Main St', 'pass2');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (3, 'Alice Johnson', 'alice_johnson@example.com', '555-8636', '516 Main St', 'pass3');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (4, 'Bob Brown', 'bob_brown@example.com', '555-7141', '667 Main St', 'pass4');
INSERT INTO customer (customer_id, name, email, phone, address, password) VALUES (5, 'Charlie Davis', 'charlie_davis@example.com', '555-6108', '943 Main St', 'pass5');

INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (1, 1, 16, '2023-12-03 20:34:36', '2023-11-15 03:45:08', 'COMPLETED', 200.59);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (2, 4, 20, '2023-09-28 21:55:18', '2023-08-26 05:23:52', 'CONFIRMED', 483.56);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (3, 1, 1, '2023-01-30 16:42:23', '2023-02-21 20:30:55', 'COMPLETED', 229.18);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (4, 4, 13, '2023-09-19 11:29:57', '2023-02-11 07:38:03', 'CONFIRMED', 306.06);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (5, 1, 4, '2023-04-21 16:03:43', '2023-06-20 07:04:40', 'COMPLETED', 222.95);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (6, 2, 8, '2023-08-16 15:46:24', '2023-06-16 08:11:45', 'CANCELLED', 181.07);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (7, 5, 18, '2023-06-24 09:23:18', '2023-01-28 00:47:31', 'COMPLETED', 416.9);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (8, 3, 8, '2023-01-06 01:38:13', '2023-08-29 02:14:12', 'COMPLETED', 367.66);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (9, 5, 11, '2023-09-30 10:30:06', '2023-04-29 20:36:56', 'COMPLETED', 394.14);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (10, 4, 20, '2023-03-10 16:02:53', '2023-01-30 02:59:19', 'COMPLETED', 110.04);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (11, 1, 18, '2023-05-27 19:59:43', '2023-10-17 12:02:34', 'CONFIRMED', 307.27);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (12, 2, 19, '2023-04-15 07:23:47', '2023-02-17 14:53:19', 'COMPLETED', 221.77);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (13, 3, 13, '2023-08-06 00:32:44', '2023-05-03 19:42:31', 'COMPLETED', 217.75);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (14, 1, 19, '2023-10-15 00:36:54', '2023-11-19 02:37:54', 'CANCELLED', 446.6);
INSERT INTO reservation (reservation_id, customer_id, car_id, start_date, end_date, status, payment_amount) VALUES (15, 1, 6, '2023-10-19 04:59:23', '2023-12-12 19:36:35', 'COMPLETED', 263.66);

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