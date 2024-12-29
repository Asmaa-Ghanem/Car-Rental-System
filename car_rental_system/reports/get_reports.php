<?php
require_once '../car_management_page/db.php';

$response = ["success" => false, "data" => null];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $reportType = $_POST['reportType'];
    $startDate = $_POST['startDate'] ?? null;
    $endDate = $_POST['endDate'] ?? null;
    $carId = $_POST['carId'] ?? null;
    $customerId = $_POST['customerId'] ?? null;

    try {
        switch ($reportType) {
            case 'reservations_period':
                $query = "SELECT r.*, c.model, c.plate_id, cu.name, cu.email, p.*, re.* FROM reservation r 
                          JOIN car c ON r.car_id = c.car_id 
                          JOIN customer cu ON r.customer_id = cu.customer_id 
                          JOIN pickup p ON r.reservation_id = p.reservation_id
                          JOIN `return` re ON r.reservation_id = re.reservation_id
                          WHERE r.start_date >= ? AND r.end_date <= ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ss', $startDate, $endDate);
                break;

            case 'reservations_car':
                $query = "SELECT r.*, c.model, c.plate_id, p.*, re.* FROM reservation r 
                          JOIN car c ON r.car_id = c.car_id
                          JOIN pickup p ON r.reservation_id = p.reservation_id
                          JOIN `return` re ON r.reservation_id = re.reservation_id 
                          WHERE r.car_id = ? AND r.start_date >= ? AND r.end_date <= ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('iss', $carId, $startDate, $endDate);
                break;

            // case 'car_status':
            //     $query = "SELECT * FROM car WHERE ? BETWEEN (SELECT MIN(start_date) FROM reservation WHERE car_id = car.car_id) 
            //               AND (SELECT MAX(end_date) FROM reservation WHERE car_id = car.car_id)";
            //     $stmt = $conn->prepare($query);
            //     $stmt->bind_param('s', $startDate);
            //     break;
            case 'car_status':
                $query = "
                    SELECT c.*, 
                           CASE 
                               WHEN EXISTS (
                                   SELECT 1 
                                   FROM reservation r 
                                   WHERE r.car_id = c.car_id AND ? BETWEEN r.start_date AND r.end_date
                               ) THEN 'RESERVED on this day'
                               ELSE c.status
                           END AS effective_status
                    FROM car c;
                ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('s', $startDate);
                break;
            

            case 'reservations_customer':
                $query = "SELECT r.*, c.model, c.plate_id, cu.name, cu.email, cu.phone, cu.address, p.*, re.* FROM reservation r 
                JOIN car c ON r.car_id = c.car_id 
                JOIN customer cu ON r.customer_id = cu.customer_id 
                JOIN pickup p ON r.reservation_id = p.reservation_id
                JOIN `return` re ON r.reservation_id = re.reservation_id
                WHERE r.customer_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $customerId);
                break;

            case 'daily_payments':
                $query = "SELECT p.*, r.car_id, r.customer_id, pi.*, re.* FROM payment p 
                          JOIN reservation r ON p.reservation_id = r.reservation_id
                          JOIN pickup pi ON r.reservation_id = pi.reservation_id
                          JOIN `return` re ON r.reservation_id = re.reservation_id 
                          WHERE p.payment_date BETWEEN ? AND ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('ss', $startDate, $endDate);
                break;

            default:
                throw new Exception("Invalid report type");
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $response["data"] = $result->fetch_all(MYSQLI_ASSOC);
        $response["success"] = true;

    } catch (Exception $e) {
        $response["message"] = $e->getMessage();
    }
}

echo json_encode($response);
?>
