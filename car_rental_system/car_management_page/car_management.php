<?php
session_start();
?>
<!-- Display error or success message -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="car_management_styles.css">
    <script src="car_management_script.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-3">Car Management</h1>
        <div class="row">

            <!-- add car -->
            <div class="col-md-6 form-container bg-white border rounded">
                <h2 class="form-title text-center">Add Car</h2>
                <form id="addCarForm" method="POST" onsubmit="return validateAddCarForm()" name="addCarForm" action="add_car.php">
                    <div class="mb-3">
                        <label for="car_id" class="form-label">Car ID</label>
                        <input type="number" class="form-control" id="car_id_add" name="car_id_add" required>
                        <span id="carIdError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model_add" name="model_add" required>
                        <span id="modelError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="year_add" name="year_add" required>
                        <span id="yearError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="plate_id" class="form-label">Plate ID</label>
                        <input type="text" class="form-control" id="plate_id_add" name="plate_id_add" required>
                        <span id="plateIdError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status_add" name="status_add" required>
                            <option value="">-- Select Status --</option>
                            <option value="ACTIVE">Active</option>
                            <option value="OUT OF SERVICE">Out of Service</option>
                            <option value="RENTED">Rented</option>
                            <option value="RESERVED">Reserved</option>
                        </select>
                        <span id="statusError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="office_id" class="form-label">Office ID</label>
                        <input type="number" class="form-control" id="office_id_add" name="office_id_add" required>
                        <span id="officeIdError" class="text-danger"></span>
                    </div>
                    <button type="submit" class="btn-primary w-100">Add Car</button>
                </form>
            </div>
            
            <!-- update car -->
            <div class="col-md-6 form-container bg-white border rounded">
                <h2 class="form-title text-center">Update Car</h2>
                <form id="updateCarForm" method="POST" onsubmit="return validateUpdateCarForm()" action="update_car.php">
                    <div class="mb-2">
                        <label for="car_id" class="form-label">Car ID (Required)</label>
                        <input type="number" class="form-control" id="car_id_update" name="car_id_update" required>
                        <span id="carIdErrorUpdate" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" id="model_update" name="model_update">
                    </div>
                    <div class="mb-2">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="year_update" name="year_update">
                    </div>
                    <div class="mb-2">
                        <label for="plate_id" class="form-label">Plate ID</label>
                        <input type="text" class="form-control" id="plate_id_update" name="plate_id_update">
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status_update" name="status_update">
                            <option value="">-- Select Status --</option>
                            <option value="ACTIVE">Active</option>
                            <option value="OUT OF SERVICE">Out of Service</option>
                            <option value="RENTED">Rented</option>
                            <option value="RESERVED">Reserved</option>
                        </select>
                        <span id="updateStatusError" class="text-danger"></span>
                    </div>
                    <div class="mb-2">
                        <label for="office_id" class="form-label">Office ID</label>
                        <input type="number" class="form-control" id="office_id_update" name="office_id_update">
                    </div>
                    <button type="submit" class="btn-warning w-100">Update Car</button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
