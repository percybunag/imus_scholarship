
function nextStep(step) {
    document.getElementById('step-' + (step - 1)).classList.remove('active');
    document.getElementById('step-' + step).classList.add('active');
}

function prevStep(step) {
    document.getElementById('step-' + (step + 1)).classList.remove('active');
    document.getElementById('step-' + step).classList.add('active');
}
function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function validatePassword(password) {
    // Password must be at least 8 characters long and include at least one uppercase letter,
    // one lowercase letter, one digit, and one special character.
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password);
}

function sendOtp() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    const email = emailInput.value;
    const password = passwordInput.value;

    let isValid = true;

    // Validate email
    if (!validateEmail(email)) {
        emailInput.setCustomValidity('Please enter a valid email address.');
        isValid = false;
    } else {
        emailInput.setCustomValidity('');
    }

    // Validate password
    if (!validatePassword(password)) {
        passwordInput.setCustomValidity('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.');
        isValid = false;
    } else {
        passwordInput.setCustomValidity('');
    }

    // Show validation messages if invalid
    emailInput.reportValidity();
    passwordInput.reportValidity();

    if (!isValid) return; // Prevent proceeding if validation fails

    // Proceed with OTP sending if validation passed
    fetch('/imus_scholarship/assets/scripts/process_registration.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'send_otp',
            email: email,
            password: password
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            nextStep(2);
        } else {
            document.getElementById('otp-alert').textContent = data.message;
            document.getElementById('otp-alert').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('otp-alert').textContent = 'An error occurred. Please try again.';
        document.getElementById('otp-alert').style.display = 'block';
    });
}



function validateContactNumber(contactNumber) {
    // Contact number must be either all numbers or start with + followed by numbers
    const contactPattern = /^\+?\d+$/;
    return contactPattern.test(contactNumber);
}

function storePersonalInfo() {
    const firstNameInput = document.getElementById('first-name');
    const middleNameInput = document.getElementById('middle-name');
    const lastNameInput = document.getElementById('last-name');
    const unitFloorInput = document.getElementById('unit-floor');
    const streetSubdivisionInput = document.getElementById('street-subdivision');
    const barangayInput = document.getElementById('barangay');
    const dobInput = document.getElementById('dob');
    const contactNumberInput = document.getElementById('contact-number');
    const genderInput = document.getElementById('gender');

    const firstName = firstNameInput.value;
    const middleName = middleNameInput.value;
    const lastName = lastNameInput.value;
    const unitFloor = unitFloorInput.value;
    const streetSubdivision = streetSubdivisionInput.value;
    const barangay = barangayInput.value;
    const dob = dobInput.value;
    const contactNumber = contactNumberInput.value;
    const gender = genderInput.value;

    let isValid = true;

    // Validate personal information
    if (!firstName) {
        firstNameInput.setCustomValidity('First name is required.');
        isValid = false;
    } else {
        firstNameInput.setCustomValidity('');
    }

    if (!middleName) {
        middleNameInput.setCustomValidity('Middle name is required.');
        isValid = false;
    } else {
        middleNameInput.setCustomValidity('');
    }

    if (!lastName) {
        lastNameInput.setCustomValidity('Last name is required.');
        isValid = false;
    } else {
        lastNameInput.setCustomValidity('');
    }

    if (!unitFloor) {
        unitFloorInput.setCustomValidity('Unit/Floor is required.');
        isValid = false;
    } else {
        unitFloorInput.setCustomValidity('');
    }

    if (!streetSubdivision) {
        streetSubdivisionInput.setCustomValidity('Street/Subdivision is required.');
        isValid = false;
    } else {
        streetSubdivisionInput.setCustomValidity('');
    }

    if (!barangay) {
        barangayInput.setCustomValidity('Barangay is required.');
        isValid = false;
    } else {
        barangayInput.setCustomValidity('');
    }

    if (!dob) {
        dobInput.setCustomValidity('Date of Birth is required.');
        isValid = false;
    } else {
        dobInput.setCustomValidity('');
    }

    if (!validateContactNumber(contactNumber)) {
        contactNumberInput.setCustomValidity('Contact number must be either all numbers or start with + followed by numbers.');
        isValid = false;
    } else {
        contactNumberInput.setCustomValidity('');
    }

    if (!gender) {
        genderInput.setCustomValidity('Gender is required.');
        isValid = false;
    } else {
        genderInput.setCustomValidity('');
    }

    // Show validation messages if invalid
    firstNameInput.reportValidity();
    middleNameInput.reportValidity();
    lastNameInput.reportValidity();
    unitFloorInput.reportValidity();
    streetSubdivisionInput.reportValidity();
    barangayInput.reportValidity();
    dobInput.reportValidity();
    contactNumberInput.reportValidity();
    genderInput.reportValidity();

    if (!isValid) return; // Prevent proceeding if validation fails

    // Store personal info in session via AJAX
    fetch('/imus_scholarship/assets/scripts/process_registration.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'store_personal_info',
            first_name: firstName,
            middle_name: middleName,
            last_name: lastName,
            unit_floor: unitFloor,
            street_subdivision: streetSubdivision,
            barangay: barangay,
            dob: dob,
            contact_number: contactNumber,
            gender: gender
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Move to the next step
            nextStep(3);
        } else {
            document.getElementById('personal-info-error').textContent = data.message;
            document.getElementById('personal-info-error').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('personal-info-error').textContent = 'An error occurred. Please try again.';
        document.getElementById('personal-info-error').style.display = 'block';
    });
}

// Add event listener to the contact number field
document.getElementById('contact-number').addEventListener('input', function(event) {
    const input = event.target;
    // Allow only digits and a leading +
    input.value = input.value.replace(/[^+\d]/g, '');
});
function verifyOtp() {
    const otp = [
        document.getElementById('otp1').value,
        document.getElementById('otp2').value,
        document.getElementById('otp3').value,
        document.getElementById('otp4').value,
        document.getElementById('otp5').value,
        document.getElementById('otp6').value
    ].join('');

    if (otp.length !== 6) {
        document.getElementById('otp-error').textContent = 'Please enter all 6 digits.';
        document.getElementById('otp-error').style.display = 'block';
        return;
    }

    fetch('/imus_scholarship/assets/scripts/process_registration.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'verify_otp',
            otp: otp
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            nextStep(4); // Show the success banner
        } else {
            document.getElementById('otp-error').textContent = data.message;
            document.getElementById('otp-error').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('otp-error').textContent = 'An error occurred. Please try again.';
        document.getElementById('otp-error').style.display = 'block';
    });
}



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('step-1').classList.add('active');
});
function resendOtp() {
    fetch('/imus_scholarship/assets/scripts/process_registration.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: 'resend_otp'
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('resend-otp-alert').textContent = 'OTP has been resent successfully.';
            document.getElementById('resend-otp-alert').style.display = 'block';
            document.getElementById('otp-error').style.display = 'none';  // Hide the OTP error if any
        } else {
            document.getElementById('resend-otp-alert').textContent = data.message;
            document.getElementById('resend-otp-alert').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('resend-otp-alert').textContent = 'An error occurred. Please try again.';
        document.getElementById('resend-otp-alert').style.display = 'block';
    });
}


