function showForm(radio) {
    var customerForm = document.getElementById('customerForm');
    var agencyForm = document.getElementById('agencyForm');
    if (radio.value === 'customer') {
        customerForm.style.display = "block";
        agencyForm.style.display = "none";
    }
    else if (radio.value === 'agency') {
        customerForm.style.display = "none";
        agencyForm.style.display = "block";
    }
}