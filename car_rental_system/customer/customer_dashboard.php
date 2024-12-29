<?php

$conn = new mysqli("localhost", "root", "", "car_rental_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$model = $_POST['searchModel'] ?? 'All Models';
$color = $_POST['searchColor'] ?? 'All Colours';
$size = $_POST['searchSize'] ?? 'All Sizes';
$searchText = $_POST['Search'] ?? '';

$query = "SELECT * FROM car WHERE 1";

if ($model != 'All Models') {
    $query .= " AND model = '$model'";
}
if ($color != 'All Colours') {
    $query .= " AND color = '$color'";
}
if ($size != 'All Sizes') {
    $query .= " AND size = '$size'";
}
if (!empty($searchText)) {
    $query .= " AND (model LIKE '%$searchText%' OR color LIKE '%$searchText%' OR size LIKE '%$searchText%')";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "
        <table border='1'>
            <tr>
                <th>Model</th>
                <th>Color</th>
                <th>Size</th>
                <th>Year</th>
                <th>Plate ID</th>
                <th>Status</th>
                <th>Price Per Day</th>
                <th>Reserve</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['model']}</td>
                <td>{$row['color']}</td>
                <td>{$row['size']}</td>
                <td>{$row['year']}</td>
                <td>{$row['plate_id']}</td>
                <td>{$row['status']}</td>
                <td>{$row['price_per_day']}</td>";
        if ($row['status'] === 'ACTIVE') {
            echo "<td>
                    <form action='reservation.html' method='GET'>
                        <input type='hidden' name='car_id' value='{$row['car_id']}'>
                        <button type='submit'>Reserve</button>
                    </form>
                    </td>";} else {
            echo "<td>Not Available</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No cars found.";
}

$conn->close();
?>

<script>
  function reserveCar(carId) {
    alert('Car with ID ' + carId + ' reserved successfully!');
  }
</script>
