<?php
include '../car_management_page/db.php';
$model = $_POST['model'] ?? '';
$color = $_POST['color'] ?? '';
$size = $_POST['size'] ?? '';
$year = $_POST['year'] ?? '';
$office_id = $_POST['office_id'] ?? '';
$min_price = $_POST['min_price'] ?? null;
$max_price = $_POST['max_price'] ?? null;

$query = "SELECT car.* FROM car WHERE status = 'ACTIVE'";
$params = [];
$types = "";

if (!empty($model)) {
    $query .= " AND model LIKE ?";
    $params[] = "%$model%";
    $types .= "s";
}
if (!empty($color)) {
    $query .= " AND color LIKE ?";
    $params[] = "%$color%";
    $types .= "s";
}
if (!empty($size)) {
    $query .= " AND size LIKE ?";
    $params[] = "%$size%";
    $types .= "s";
}
if (!empty($year)) {
    $query .= " AND year = ?";
    $params[] = $year;
    $types .= "i";
}
if (!empty($office_id)) {
    $query .= " AND office_id = ?";
    $params[] = $office_id;
    $types .= "i";
}
if (!is_null($min_price)) {
    $query .= " AND price_per_day >= ?";
    $params[] = $min_price;
    $types .= "d";
}
if (!is_null($max_price)) {
    $query .= " AND price_per_day <= ?";
    $params[] = $max_price;
    $types .= "d";
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$cars = [];
while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($cars);
?>
