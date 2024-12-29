CREATE DATABASE car_rental_system;
USE car_rental_system;

CREATE TABLE car(
    car_id INT AUTO_INCREMENT,
    model VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL,
    size VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    plate_id VARCHAR(255) UNIQUE NOT NULL,
    status ENUM('ACTIVE', 'OUT OF SERVICE', 'RENTED') NOT NULL,
    office_id INT NOT NULL,
    price_per_day DECIMAL(10,2),
    PRIMARY KEY(car_id)
);

CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(admin_id)
);

CREATE TABLE customer(
    customer_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(255),
    address VARCHAR(255),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(customer_id)
);

CREATE TABLE reservation(
    reservation_id INT AUTO_INCREMENT,
    customer_id INT NOT NULL,
    car_id INT NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    PRIMARY KEY(reservation_id)
);

CREATE TABLE office(
    office_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_info VARCHAR(255) NOT NULL,
    PRIMARY KEY(office_id)
);

CREATE TABLE payment(
    payment_id INT AUTO_INCREMENT,
    reservation_id INT NOT NULL,
    payment_date DATETIME NOT NULL,
    amount DECIMAL(10, 2),
    card_id VARCHAR(16),
    card_cvv VARCHAR(3),
    PRIMARY KEY(payment_id)
);

CREATE TABLE pickup (
    pickup_id INT AUTO_INCREMENT,
    reservation_id INT NOT NULL,
    pickup_date DATETIME NOT NULL,
    pickup_location_id INT NOT NULL,
    PRIMARY KEY(pickup_id)
);

CREATE TABLE `return` (
    return_id INT AUTO_INCREMENT,
    reservation_id INT NOT NULL,
    return_date DATETIME NOT NULL,
    return_location_id INT NOT NULL,
    PRIMARY KEY(return_id)
);

ALTER TABLE car
ADD CONSTRAINT fk_car_office
FOREIGN KEY(office_id) REFERENCES office(office_id);

ALTER TABLE reservation
ADD CONSTRAINT fk_reservation_customer
FOREIGN KEY(customer_id) REFERENCES customer(customer_id);

ALTER TABLE reservation
ADD CONSTRAINT fk_reservation_car
FOREIGN KEY(car_id) REFERENCES car(car_id);

ALTER TABLE payment
ADD CONSTRAINT fk_payment_reservation
FOREIGN KEY(reservation_id) REFERENCES reservation(reservation_id);

ALTER TABLE pickup
ADD CONSTRAINT fk_pickup_reservation
FOREIGN KEY(reservation_id) REFERENCES reservation(reservation_id);

ALTER TABLE pickup
ADD CONSTRAINT fk_pickup_office
FOREIGN KEY(pickup_location_id) REFERENCES office(office_id);

ALTER TABLE `return`
ADD CONSTRAINT fk_return_reservation
FOREIGN KEY(reservation_id) REFERENCES reservation(reservation_id);

ALTER TABLE `return`
ADD CONSTRAINT fk_return_office
FOREIGN KEY(return_location_id) REFERENCES office(office_id);
