// Add email value for which user selected
document.getElementById('user_id').addEventListener('change', function () {
    var selectedOption = this.options[this.selectedIndex];
    var emailInput = document.getElementById('email_pelanggan');

    // Set email input value based on selected user's email
    emailInput.value = selectedOption.getAttribute('user-email') || '';
});