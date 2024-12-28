<?php
header('Content-Type: application/json');
session_start();
include 'db.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id_add'];
    $model = $_POST['model_add'];
    $color = $_POST['color_add'];
    $size = $_POST['size_add'];
    $year = $_POST['year_add'];
    $plate_id = $_POST['plate_id_add'];
    $status = $_POST['status_add'];
    $office_id = $_POST['office_id_add'];
    $price = $_POST['price_add'];

    try {
        $check_sql = "SELECT * FROM car WHERE car_id = ? OR plate_id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("is", $car_id, $plate_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode([
                "success" => false,
                "message" => "Car or Plate ID already exists in the database."
            ]);
            exit;
        }

        $insert_sql = "INSERT INTO car (car_id, model, color, size, year, plate_id, status, office_id, price_per_day) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("isssissid", $car_id, $model, $color, $size, $year, $plate_id, $status, $office_id, $price);

        if ($stmt->execute()) {
            echo json_encode([
                "success" => true,
                "message" => "Car added successfully!"
            ]);
        }
    } catch (mysqli_sql_exception $e) {
        echo json_encode([
            "success" => false,
            // "message" => "Database error: " . $e->getMessage()
            "message" => "Error Adding Car!"
        ]);
    } finally {
        $stmt->close();
        $conn->close();
    }
    exit;
}
?>
