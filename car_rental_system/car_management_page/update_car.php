<?php
header('Content-Type: application/json');
session_start();
include 'db.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id_update'];
    $model = $_POST['model_update'] ?? null;
    $color = $_POST['color_update'] ?? null;
    $size = $_POST['size_update'] ?? null;
    $year = $_POST['year_update'] ?? null;
    $plate_id = $_POST['plate_id_update'] ?? null;
    $status = $_POST['status_update'] ?? null;
    $office_id = $_POST['office_id_update'] ?? null;
    $price = $_POST['price_update'] ?? null;

    try {
        $check_sql = "SELECT * FROM car WHERE car_id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo json_encode([
                "success" => false,
                "message" => "Error: No car found with the provided Car ID."
            ]);
            exit;
        }

        $fields = [];
        $params = [];
        $types = "";

        if (!empty($model)) {
            $fields[] = "model = ?";
            $params[] = $model;
            $types .= "s";
        }
        if (!empty($color)) {
            $fields[] = "color = ?";
            $params[] = $color;
            $types .= "s";
        }
        if (!empty($size)) {
            $fields[] = "size = ?";
            $params[] = $size;
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
        if (!empty($price)) {
            $fields[] = "price_per_day = ?";
            $params[] = $price;
            $types .= "d";
        }

        if (count($fields) > 0) {
            $params[] = $car_id;
            $types .= "i";

            $sql = "UPDATE car SET " . implode(", ", $fields) . " WHERE car_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param($types, ...$params);

            if ($stmt->execute()) {
                echo json_encode([
                    "success" => true,
                    "message" => "Car details updated successfully!"
                ]);
            }
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Error: No fields provided to update."
            ]);
        }
    } catch (mysqli_sql_exception $e) {
        echo json_encode([
            "success" => false,
            // "message" => "Database error: " . $e->getMessage()
            "message" => "Error updating car!"
        ]);
    } finally {
        $stmt->close();
        $conn->close();
    }
    exit;
}
?>
