<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $car_id = $_POST['car_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    // Check if customer exists
    $check_customer = "SELECT customer_id FROM customer WHERE customer_id = ?";
    $stmt = $conn->prepare($check_customer);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $customer_result = $stmt->get_result();
    
    if ($customer_result->num_rows == 0) {
        echo "<script>
                alert('Customer ID does not exist');
                window.location.href = 'customer_reserve.html';
              </script>";
        exit();
    }
    
    // Check if car is available (status = ACTIVE)
    $check_car = "SELECT status FROM car WHERE car_id = ? AND status = 'ACTIVE'";
    $stmt = $conn->prepare($check_car);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        echo "<script>
                alert('Car is not available for reservation');
                window.location.href = 'customer_reserve.html';
              </script>";
        exit();
    }
    
    // Begin transaction
    $conn->begin_transaction();
    
    try {
        // Insert reservation
        $insert_reservation = "INSERT INTO reservation (customer_id, car_id, start_date, end_date) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_reservation);
        $stmt->bind_param("iiss", $customer_id, $car_id, $start_date, $end_date);
        $stmt->execute();
        
        // Update car status to RENTED
        $update_car = "UPDATE car SET status = 'RENTED' WHERE car_id = ?";
        $stmt = $conn->prepare($update_car);
        $stmt->bind_param("i", $car_id);
        $stmt->execute();
        
        $conn->commit();
        echo "<script>
                alert('Reservation successful!');
                window.location.href = 'customer_reserve.html';
              </script>";
        
    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>
                alert('Error occurred: " . $e->getMessage() . "');
                window.location.href = 'customer_reserve.html';
              </script>";
    }
}
?>