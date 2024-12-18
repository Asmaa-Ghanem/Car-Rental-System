<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 14px;
        }
        .form-container {
            padding: 15px;
        }
        .form-title {
            font-size: 18px;
            font-weight: bold;
        }
        .form-label {
            font-size: 12px;
            margin-bottom: 5px;
        }
        .btn {
            font-size: 12px;
            padding: 5px 10px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <h1 class="text-center my-3">Car Management</h1>
    <div class="row">

        <!-- add car -->
        <div class="col-md-6 form-container bg-white border rounded">
            <h2 class="form-title text-center">Add Car</h2>
            <form id="addCarForm" action="add_car.php" method="POST" onsubmit="return validateAddCarForm()">
                <div class="mb-3">
                    <label for="car_id" class="form-label">Car ID</label>
                    <input type="number" class="form-control" id="car_id" name="car_id" required>
                </div>
                <div class="mb-2">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model" required>
                </div>
                <div class="mb-2">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year" required>
                </div>
                <div class="mb-2">
                    <label for="plate_id" class="form-label">Plate ID</label>
                    <input type="text" class="form-control" id="plate_id" name="plate_id" required>
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="ACTIVE">Active</option>
                        <option value="OUT OF SERVICE">Out of Service</option>
                        <option value="RENTED">Rented</option>
                        <option value="RESERVED">Reserved</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="office_id" class="form-label">Office ID</label>
                    <input type="number" class="form-control" id="office_id" name="office_id" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Car</button>
            </form>
        </div>

        <!-- update car -->
        <div class="col-md-6 form-container bg-white border rounded">
            <h2 class="form-title text-center">Update Car</h2>
            <form id="updateCarForm" action="update_car.php" method="POST" onsubmit="return validateUpdateCarForm()">
                <div class="mb-2">
                    <label for="car_id" class="form-label">Car ID (Required)</label>
                    <input type="number" class="form-control" id="car_id" name="car_id" required>
                </div>
                <div class="mb-2">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>
                <div class="mb-2">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control" id="year" name="year">
                </div>
                <div class="mb-2">
                    <label for="plate_id" class="form-label">Plate ID</label>
                    <input type="text" class="form-control" id="plate_id" name="plate_id">
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">-- Select Status --</option>
                        <option value="ACTIVE">Active</option>
                        <option value="OUT OF SERVICE">Out of Service</option>
                        <option value="RENTED">Rented</option>
                        <option value="RESERVED">Reserved</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="office_id" class="form-label">Office ID</label>
                    <input type="number" class="form-control" id="office_id" name="office_id">
                </div>
                <button type="submit" class="btn btn-warning w-100">Update Car</button>
            </form>
        </div>

    </div>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
