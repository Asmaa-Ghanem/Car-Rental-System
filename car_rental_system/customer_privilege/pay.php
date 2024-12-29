<?php 
require_once 'db.php'; 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $reservation_id = $_POST['reserve_id2']; 
    $payment_date = $_POST['payment_date']; 
    $card_id = $_POST['card_id']; 
    $card_cvv = $_POST['card_cvv']; 

    // check payment is not already made
    $check_payment = "SELECT * FROM payment WHERE reservation_id = ?";
    $stmt = $conn->prepare($check_payment);
    $stmt->bind_param("i", $reservation_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Payment record already exists
        echo "<script> 
                alert('Payment has already been made for this reservation'); 
                window.location.href = 'customer_reserve.html'; 
                </script>"; 
        exit();
    }
        
    // Verify reservation exists and get start/end dates
    $check_reservation = "SELECT reservation_id, start_date, end_date FROM reservation WHERE reservation_id = ?"; 
    $stmt = $conn->prepare($check_reservation); 
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

    // Get reservation dates for validation
    $reservation = $result->fetch_assoc();
    if ($payment_date < $reservation['start_date'] || $payment_date > $reservation['end_date']) {
        echo "<script> 
                alert('Payment date must be between reservation start and end date'); 
                window.location.href = 'customer_reserve.html'; 
                </script>"; 
        exit();
    }
        
    // Calculate payment amount based on reservation days and car price 
    $get_price = "SELECT r.start_date, r.end_date, c.price_per_day,
                    DATEDIFF(r.end_date, r.start_date) as days  
                    FROM reservation r  
                    JOIN car c ON r.car_id = c.car_id  
                    WHERE r.reservation_id = ?";
    $stmt = $conn->prepare($get_price); 
    $stmt->bind_param("i", $reservation_id); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 
    $row = $result->fetch_assoc(); 

    $days = $row['days'] + 1;
    $amount = $row['days'] * $row['price_per_day']; 
        
    // Round the amount to 2 decimal places to avoid floating point comparison issues
    $amount = round($amount, 2);
    $posted_payment = round($_POST['payment'], 2);

    // Verify payment amount matches calculated amount 
    if ($posted_payment != $posted_payment) { 
        echo "<script> 
                alert('Payment amount must be $posted_payment (calculated as $days days * {$row['price_per_day']} per day)'); 
                window.location.href = 'customer_reserve.html'; 
                </script>"; 
        exit(); 
    }
        
    // Insert payment record 
    $insert_payment = "INSERT INTO payment (reservation_id, payment_date, amount, card_id, card_cvv)  
                        VALUES (?, ?, ?, ?, ?)"; 
    $stmt = $conn->prepare($insert_payment); 
    $stmt->bind_param("isdss", $reservation_id, $payment_date, $amount, $card_id, $card_cvv); 
        
    if ($stmt->execute()) { 
        echo "<script> 
                alert('Payment processed successfully!'); 
                window.location.href = 'customer_reserve.html'; 
                </script>"; 
    } else { 
        echo "<script> 
                alert('Error processing payment: " . $conn->error . "'); 
                window.location.href = 'customer_reserve.html'; 
                </script>"; 
    } 
} 
?>