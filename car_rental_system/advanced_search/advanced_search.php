<?php
include '../car_management_page/db.php';

$search = $_POST['search'] ?? '';
$search = "%$search%";

// Prepare the query for advanced search
$query = "
    SELECT 
        car.car_id, car.model AS car_model, car.year AS car_year,car.size AS car_size, car.color AS car_color, car.plate_id AS car_plate_id, car.status AS car_status, car.price_per_day AS car_price_per_day,
        customer.name AS customer_name, customer.email AS customer_email, customer.phone AS customer_phone, customer.address AS customer_address,
        reservation.start_date AS reservation_start, reservation.end_date AS reservation_end, reservation.payment_amount AS reservation_payment_amount
    FROM reservation
    INNER JOIN car ON reservation.car_id = car.car_id
    INNER JOIN customer ON reservation.customer_id = customer.customer_id
    WHERE 
        car.car_id LIKE ? OR
        car.model LIKE ? OR
        car.plate_id LIKE ? OR
        car.size LIKE ? OR
        car.color LIKE ? OR
        car.status LIKE ? OR
        car.price_per_day LIKE ? OR
        customer.name LIKE ? OR
        customer.email LIKE ? OR
        customer.address LIKE ? OR
        reservation.start_date LIKE ? OR
        reservation.end_date LIKE ? OR
        reservation.payment_amount LIKE ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssssssssss',$search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
