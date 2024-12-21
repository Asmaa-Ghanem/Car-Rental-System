<?php
header('Content-Type: application/json');
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id_update'];
    $model = $_POST['model_update'] ?? null;
    $year = $_POST['year_update'] ?? null;
    $plate_id = $_POST['plate_id_update'] ?? null;
    $status = $_POST['status_update'] ?? null;
    $office_id = $_POST['office_id_update'] ?? null;

    $check_sql = "SELECT * FROM car WHERE car_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // echo "Error: No car found with the provided Car ID.";
        echo json_encode([
            "success" => false,
            "message" => "Error: No car found with the provided Car ID."
        ]);
        exit;
    } else {
        $fields = [];
        $params = [];
        $types = "";

        if (!empty($model)) {
            $fields[] = "model = ?";
            $params[] = $model;
            $types .= "s";
        }
        if (!empty($year)) {
            $fields[] = "year = ?";
            $params[] = $year;
            $types .= "i";
        }
        if (!empty($plate_id)) {
            $fields[] = "plate_id = ?";
            $params[] = $plate_id;
            $types .= "s";
        }
        if (!empty($status)) {
            $fields[] = "status = ?";
            $params[] = $status;
            $types .= "s";
        }
        if (!empty($office_id)) {
            $fields[] = "office_id = ?";
            $params[] = $office_id;
            $types .= "i";
        }

        if (count($fields) > 0) {
            $params[] = $car_id;
            $types .= "i";

            $sql = "UPDATE car SET " . implode(", ", $fields) . " WHERE car_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param($types, ...$params);

            if ($stmt->execute()) {
                // echo "Car details updated successfully!";
                echo json_encode([
                    "success" => true,
                    "message" => "Car details updated successfully!"
                ]);
            } else {
                // echo "Error: " . $stmt->error;
                echo json_encode([
                    "success" => false,
                    "message" => "Error:  $stmt->error"
                ]);
            }
        } else {
            // echo "Error: No fields provided to update.";
            echo json_encode([
                "success" => false,
                "message" => "Error: No fields provided to update."
            ]);
        }
    }
    $stmt->close();
    $conn->close();
    exit;
}
?>
