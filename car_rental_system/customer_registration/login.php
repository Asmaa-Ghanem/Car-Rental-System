<?php
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "car_rental_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT customer_id, name, password FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($customer_id, $name, $storedPassword);
        $stmt->fetch();

        if ($password === $storedPassword) {
            echo "Welcome, " . htmlspecialchars($name) . "!";
            echo "<script>
                    alert('Welcome $name !');
                    window.location.href = '../basic_search/search_cars.html?customer_id=$customer_id&name=$name';
                  </script>";
        } else {
            echo "<script>
                    alert('Incorrect password!');
                    window.location.href = 'login.html';
                  </script>";
           }
    } else {
        echo "<script>
        alert('No user registered with this email');
        window.location.href = 'login.html';
      </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
