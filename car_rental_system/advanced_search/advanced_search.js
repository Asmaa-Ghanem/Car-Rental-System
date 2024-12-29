document.getElementById('searchForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);

    const response = await fetch('advanced_search.php', {
        method: 'POST',
        body: formData
    });

    const data = await response.json();
    const resultsDiv = document.getElementById('results');
    resultsDiv.innerHTML = '';

    if (data.length === 0) {
        resultsDiv.innerHTML = '<p>No results found.</p>';
        return;
    }

    const table = document.createElement('table');
    table.className = 'table table-striped';
    table.innerHTML = `
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Car Model</th>
                <th>Car Year</th>
                <th>Car Size</th>
                <th>Car Color</th>
                <th>Plate ID</th>
                <th>Car Status</th>
                <th>Car Price-per-day</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Reservation Start</th>
                <th>Reservation End</th>
                <th>Reservation Payment</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    `;

    const tbody = table.querySelector('tbody');

    data.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.car_id}</td>
            <td>${row.car_model}</td>
            <td>${row.car_year}</td>
            <td>${row.car_size}</td>
            <td>${row.car_color}</td>
            <td>${row.car_plate_id}</td>
            <td>${row.car_status}</td>
            <td>${row.car_price_per_day}</td>
            <td>${row.customer_name}</td>
            <td>${row.customer_email}</td>
            <td>${row.customer_phone}</td>
            <td>${row.customer_address}</td>
            <td>${row.reservation_start}</td>
            <td>${row.reservation_end}</td>
            <td>${row.reservation_payment_amount}</td>
        `;
        tbody.appendChild(tr);
    });

    resultsDiv.appendChild(table);
});