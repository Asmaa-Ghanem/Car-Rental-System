<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);

    $conn = new mysqli("localhost", "root", "", "car_rental_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
        alert('Email already exists');
        window.location.href = 'signup.html';
            </script>";
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO customer (name, password, email, phone, address) 
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("sssss", $name, $password, $email, $phone, $address);

        if ($stmt->execute()) {
            echo "<script>
            alert('Successful Registration!');
            window.location.href = 'login.html';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
