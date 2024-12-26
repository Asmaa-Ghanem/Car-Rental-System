document.getElementById('addCarForm').addEventListener('submit', async (e) => {
    e.preventDefault(); // Prevent form from refreshing the page
    
    if(validateAddCarForm() === true){
        // Collect form data
        const formData = new FormData(e.target);
        const response = await fetch('add_car.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        // Display the alert message
        const alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = `
            <div class="alert alert-${result.success ? 'success' : 'danger'}">
                ${result.message}
            </div>
        `;

        if (result.success) {
            e.target.reset(); // Clear the form on success
        }
    }
    
});

document.getElementById('updateCarForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    if(validateUpdateCarForm() === true){
        const formData = new FormData(e.target);
        const response = await fetch('update_car.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        const alertContainer = document.getElementById('alert-container');
        alertContainer.innerHTML = `
            <div class="alert alert-${result.success ? 'success' : 'danger'}">
                ${result.message}
            </div>
        `;

        if (result.success) {
            e.target.reset();
        }
    }
    
    
});

function validateAddCarForm() {
    let isValid = true;

    document.getElementById('carIdError').textContent = '';
    document.getElementById('modelError').textContent = '';
    document.getElementById('colorError').textContent = '';
    document.getElementById('sizeError').textContent = '';
    document.getElementById('yearError').textContent = '';
    document.getElementById('plateIdError').textContent = '';
    document.getElementById('statusError').textContent = '';
    document.getElementById('officeIdError').textContent = '';
    document.getElementById('priceError').textContent = '';
    
    const carId = document.getElementById('car_id_add').value.trim();
    if (carId === '' || carId <= 0) {
        document.getElementById('carIdError').textContent = 'Enter a valid Car ID.';
        isValid = false;
    }

    const model = document.getElementById('model_add').value.trim();
    if (model === '') {
        document.getElementById('modelError').textContent = 'Model is required.';
        isValid = false;
    }

    const color = document.getElementById('color_add').value.trim();
    if (color === '') {
        document.getElementById('colorError').textContent = 'Color is required.';
        isValid = false;
    }

    const size = document.getElementById('size_add').value.trim();
    if (model === '') {
        document.getElementById('sizeError').textContent = 'size is required.';
        isValid = false;
    }

    const year = document.getElementById('year_add').value.trim();
    if (year === '' || isNaN(year) || year < 1900 || year > new Date().getFullYear()) {
        document.getElementById('yearError').textContent = 'Enter a valid year.';
        isValid = false;
    }

    const plateId = document.getElementById('plate_id_add').value.trim();
    if (plateId === '') {
        document.getElementById('plateIdError').textContent = 'Plate ID is required.';
        isValid = false;
    }

    const status = document.getElementById('status_add').value;
    if (status === '') {
        document.getElementById('statusError').textContent = 'Status is required.';
        isValid = false;
    }

    const officeId = document.getElementById('office_id_add').value.trim();
    if (officeId === '' || isNaN(officeId) || officeId <= 0) {
        document.getElementById('officeIdError').textContent = 'Enter a valid Office ID.';
        isValid = false;
    }

    const price = document.getElementById('price_add').value.trim();
    if (price === '' || isNaN(price) || price <= 0) {
        document.getElementById('priceError').textContent = 'Enter a valid price';
        isValid = false;
    }

    return isValid;
}

function validateUpdateCarForm() {
    let isValid = true;

    document.getElementById('carIdErrorUpdate').textContent = '';
    document.getElementById('updateStatusError').textContent = '';
    document.getElementById('yearUpdateError').textContent = '';
    document.getElementById('priceUpdateError').textContent = '';

    const carId = document.getElementById('car_id_update').value.trim();
    if (carId === '' || isNaN(carId) || carId <= 0) {
        document.getElementById('carIdErrorUpdate').textContent = 'Enter a valid Car ID.';
        isValid = false;
    }

    const year = document.getElementById('year_update').value.trim();
    if (year != '' && (year < 1900 || year > new Date().getFullYear())) {
        document.getElementById('yearUpdateError').textContent = 'Enter a valid year.';
        isValid = false;
    }

    // const status = document.getElementById('status_update').value;
    // if (status === '') {
    //     document.getElementById('updateStatusError').textContent = 'Status is required.';
    //     isValid = false;
    // }

    const price = document.getElementById('price_update').value;
    if (price != '' && price <= 0) {
        document.getElementById('priceUpdateError').textContent = 'Enter a valid price.';
        isValid = false;
    }
    return isValid;
}
