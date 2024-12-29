setStartDate();
setEndDate();
document.getElementById('reportType').addEventListener('change', () => {
    const reportType = document.getElementById('reportType').value;
    document.getElementById('carIdField').classList.toggle('d-none', reportType !== 'reservations_car');
    document.getElementById('customerIdField').classList.toggle('d-none', reportType !== 'reservations_customer');

    const startDateField = document.getElementById('startDateField');
    const endDateField = document.getElementById('endDateField');

    if (reportType === 'car_status') {
        startDateField.classList.remove('d-none');
        endDateField.classList.add('d-none');
    } else {
        startDateField.classList.remove('d-none');
        endDateField.classList.remove('d-none');
    }
});

document.getElementById('reportForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const reportType = document.getElementById('reportType').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const carId = document.getElementById('carId').value;
    const customerId = document.getElementById('customerId').value;

    const formData = new FormData();
    formData.append('reportType', reportType);
    if (startDate) formData.append('startDate', startDate);
    if (endDate) formData.append('endDate', endDate);
    if (carId) formData.append('carId', carId);
    if (customerId) formData.append('customerId', customerId);

    const response = await fetch('get_reports.php', {
        method: 'POST',
        body: formData,
    });

    const result = await response.json();

    if (result.success) {
        displayReport(result.data);
    } else {
        alert('Error: ' + result.message);
    }
});

function displayReport(data) {
    const header = document.getElementById('reportHeader');
    const body = document.getElementById('reportBody');
    header.innerHTML = '';
    body.innerHTML = '';

    if (data.length > 0) {
        const columns = Object.keys(data[0]);
        header.innerHTML = '<tr>' + columns.map(col => `<th>${col}</th>`).join('') + '</tr>';
        body.innerHTML = data.map(row => 
            `<tr>${columns.map(col => `<td>${row[col]}</td>`).join('')}</tr>`).join('');
    } else {
        body.innerHTML = '<tr><td colspan="100%">No Data Found</td></tr>';
    }
}

function setEndDate() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    document.getElementById("endDate").value = `${year}-${month}-${day}`;
  }
function setStartDate() {
    document.getElementById("startDate").value = `1991-09-01`;
}
