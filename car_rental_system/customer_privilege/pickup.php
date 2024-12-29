<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $reservation_id = $_POST['reserve_id'];
   $pickup_date = $_POST['pickup_date'];
   $pickup_location = $_POST['pickup_location'];

   // Get office ID for the pickup location
   $get_office = "SELECT office_id FROM office WHERE location = ?";
   $stmt = $conn->prepare($get_office);
   $stmt->bind_param("s", $pickup_location);
   $stmt->execute();
   $office_result = $stmt->get_result();

   if ($office_result->num_rows == 0) {
      echo "<script>
               alert('Invalid pickup location');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   $office_row = $office_result->fetch_assoc();
   $pickup_location_id = $office_row['office_id'];

   // Verify pickup date is within reservation period
   $check_dates = "SELECT start_date, end_date FROM reservation WHERE reservation_id = ?";
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

   if ($pickup_date < $row['start_date'] || $pickup_date > $row['end_date']) {
      echo "<script>
               alert('Pickup date must be between reservation start and end dates');
               window.location.href = 'customer_reserve.html';
            </script>";
      exit();
   }

   // Insert pickup record
   $insert_pickup = "INSERT INTO pickup (reservation_id, pickup_date, pickup_location_id) 
                  VALUES (?, ?, ?)";
   $stmt = $conn->prepare($insert_pickup);
   $stmt->bind_param("isi", $reservation_id, $pickup_date, $pickup_location_id);

   if ($stmt->execute()) {
      echo "<script>
               alert('Pickup recorded successfully!');
               window.location.href = 'customer_reserve.html';
            </script>";
   } else {
      echo "<script>
               alert('Error recording pickup: " . $conn->error . "');
               window.location.href = 'customer_reserve.html';
            </script>";
   }
}
?>