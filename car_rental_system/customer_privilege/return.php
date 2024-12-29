<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $reservation_id = $_POST['reserve_id1'];
   $return_date = $_POST['return_date'];
   $return_location = $_POST['return_location'];

   // Get office ID for return location
   $get_office = "SELECT office_id FROM office WHERE location = ?";
   $stmt = $conn->prepare($get_office);
   $stmt->bind_param("s", $return_location);
   $stmt->execute();
   $office_result = $stmt->get_result();

   if ($office_result->num_rows == 0) {
      echo "<script>
               alert('Invalid return location');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   $office_row = $office_result->fetch_assoc();
   $return_location_id = $office_row['office_id'];

   // Verify return date is after pickup and before reservation end
   $check_dates = "SELECT r.end_date, p.pickup_date, p.reservation_id as pickup_exists
                  FROM reservation r 
                  LEFT JOIN pickup p ON r.reservation_id = p.reservation_id 
                  WHERE r.reservation_id = ?";
   $stmt = $conn->prepare($check_dates);
   $stmt->bind_param("i", $reservation_id);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows == 0) {
      echo "<script>
               alert('Reservation not found');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   $row = $result->fetch_assoc();

   if (!$row['pickup_exists']) {
      echo "<script>
               alert('Car has not been picked up yet');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   if ($return_date <= $row['pickup_date'] || $return_date > $row['end_date']) {
      echo "<script>
               alert('Return date must be after pickup date and before reservation end date');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   // Begin transaction
   $conn->begin_transaction();

   try {
      // Insert return record
      $insert_return = "INSERT INTO `return` (reservation_id, return_date, return_location_id) 
                        VALUES (?, ?, ?)";
      $stmt = $conn->prepare($insert_return);
      $stmt->bind_param("isi", $reservation_id, $return_date, $return_location_id);
      $stmt->execute();
      
      // Update car status back to ACTIVE
      $update_car = "UPDATE car c 
                     JOIN reservation r ON c.car_id = r.car_id 
                     SET c.status = 'ACTIVE' 
                     WHERE r.reservation_id = ?";
      $stmt = $conn->prepare($update_car);
      $stmt->bind_param("i", $reservation_id);
      $stmt->execute();
      
      $conn->commit();
      echo "<script>
               alert('Return processed successfully!');
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