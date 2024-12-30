// Retrieve customer_id from the URL
const urlParams = new URLSearchParams(window.location.search);
const customerId = urlParams.get('customer_id');
const customerName = urlParams.get('name');

// Update the welcome message
const welcomeDiv = document.getElementById('welcomeMessage');
if (customerId) {
    welcomeDiv.textContent = `Welcome, "${customerName}"-- CustomerID: ${customerId}`;
} else {
    welcomeDiv.textContent = 'Welcome, Guest!';
}

document.getElementById('carSearchForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);
    const response = await fetch('search_cars.php', {
        method: 'POST',
        body: formData,
    });

    const cars = await response.json();
    const resultsDiv = document.getElementById('searchResults');

    if (cars.length === 0) {
        resultsDiv.innerHTML = '<p class="text-danger">No cars found matching your criteria.</p>';
        return;
    }

    let html = '<table class="table table-bordered">';
    html += '<thead><tr><th>Car ID (for reservation)</th><th>Model</th><th>Color</th><th>Size</th><th>Year</th><th>Office ID</th><th>Price Per Day</th></tr></thead><tbody>';
    cars.forEach(car => {
        html += `
            <tr>
                <td>${car.car_id}</td>
                <td>${car.model}</td>
                <td>${car.color}</td>
                <td>${car.size}</td>
                <td>${car.year}</td>
                <td>${car.office_id}</td>
                <td>${car.price_per_day}</td>
            </tr>
        `;
    });
    html += '</tbody></table>';
    resultsDiv.innerHTML = html;
});
