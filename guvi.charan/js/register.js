function register() {
    // Validate form fields
    var formData = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        address: document.getElementById('address').value,
        postCode: document.getElementById('postCode').value,
        country: document.getElementById('country').value,
        email: document.getElementById('email').value,
        phoneNumber: document.getElementById('phoneNumber').value,
        password: document.getElementById('password').value,
        confirmPassword: document.getElementById('confirmPassword').value
    };

    // Perform client-side validation
    if (!validateForm(formData)) {
        return;
    }

    // Send data to the server using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/guvi.charan/php/register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Display the result on the page
                document.getElementById('registrationResult').textContent = xhr.responseText;
            } else {
                console.error('AJAX Error:', xhr.status, '-', xhr.statusText);
            }
        }
    };

    // Convert form data to URL-encoded format
    var urlEncodedData = Object.keys(formData)
        .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(formData[key]))
        .join('&');

    xhr.send(urlEncodedData);
}

// Function to perform client-side validation
function validateForm(formData) {
    for (var key in formData) {
        if (!formData[key]) {
            alert('All fields are required.');
            return false;
        }
    }

    if (formData.password !== formData.confirmPassword) {
        alert('Password and Confirm Password must match.');
        return false;
    }

    return true;
}