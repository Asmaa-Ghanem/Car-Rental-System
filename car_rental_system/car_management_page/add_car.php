<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id_add'];
    $model = $_POST['model_add'];
    $year = $_POST['year_add'];
    $plate_id = $_POST['plate_id_add'];
    $status = $_POST['status_add'];
    $office_id = $_POST['office_id_add'];

    $check_sql = "SELECT * FROM car WHERE car_id = ? OR plate_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("is",$car_id, $plate_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: Car or Plate ID already exists in the database.";
        $_SESSION['error'] = "Error: Car or Plate ID already exists in the database";
        header("Location: car_management.php");
        exit;
    } else {
        $insert_sql = "INSERT INTO car (car_id, model, year, plate_id, status, office_id) 
                       VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("isissi", $car_id, $model, $year, $plate_id, $status, $office_id);

        if ($stmt->execute()) {
            echo "New car registered successfully!";
            $_SESSION['success'] = "Car added successfully!";
        } else {
            echo "Error: " . $stmt->error;
            $_SESSION['error'] = "Error adding car: " . $conn->error;

        }
    }
    $stmt->close();
    $conn->close();
    header("Location: car_management.php");
    exit;
}
?>
