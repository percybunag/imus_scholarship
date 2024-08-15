// toggle nav-bar //
document.getElementById('toggle-btn').addEventListener('click', function () {
    const sideNav = document.getElementById('side-nav');
    const mainContent = document.getElementById('main-content');
    if (sideNav.classList.contains('hidden')) {
        sideNav.classList.remove('hidden');
        mainContent.classList.remove('shifted');
    } else {
        sideNav.classList.add('hidden');
        mainContent.classList.add('shifted');
    }
});
// Password validation and change handling
document.addEventListener('DOMContentLoaded', function() {
    const newPasswordInput = document.getElementById('new-password');
    const confirmPasswordInput = document.getElementById('confirm-Password');
    const currentPasswordInput = document.getElementById('Password');
    const passwordForm = document.querySelector('.personal-password-container form');

    function validatePassword() {
        const password = newPasswordInput.value;
        
        // Password requirements
        const minLength = 8;
        const hasNumber = /\d/;
        const hasLowerCase = /[a-z]/;
        const hasUpperCase = /[A-Z]/;
        const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/;
        
        if (password.length < minLength) {
            newPasswordInput.setCustomValidity(`Password must be at least ${minLength} characters long.`);
        } else if (!hasNumber.test(password)) {
            newPasswordInput.setCustomValidity('Password must include at least one number.');
        } else if (!hasLowerCase.test(password)) {
            newPasswordInput.setCustomValidity('Password must include at least one lowercase letter.');
        } else if (!hasUpperCase.test(password)) {
            newPasswordInput.setCustomValidity('Password must include at least one uppercase letter.');
        } else if (!hasSpecialChar.test(password)) {
            newPasswordInput.setCustomValidity('Password must include at least one special character.');
        } else {
            newPasswordInput.setCustomValidity('');
        }

        if (password !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity('Passwords do not match.');
        } else {
            confirmPasswordInput.setCustomValidity('');
        }
    }

    newPasswordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);

    passwordForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Perform AJAX request to change the password
        const formData = new FormData(passwordForm);
        fetch('../assets/scripts/change_password.php', { 
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Remove previous messages
            document.querySelectorAll('.alert').forEach(el => el.remove());
    
            if (data.success) {
                // Clear the form fields
                newPasswordInput.value = '';
                confirmPasswordInput.value = '';
                currentPasswordInput.value = '';
    
                // Display success message
                const successMessage = document.createElement('div');
                successMessage.className = 'alert alert-success';
                successMessage.textContent = data.message; // Use data.message to display success message
                passwordForm.appendChild(successMessage);
    
                // Remove success message after a few seconds
                setTimeout(() => {
                    successMessage.remove();
                }, 5000);
            } else {
                // Display error message
                const errorMessage = document.createElement('div');
                errorMessage.className = 'alert alert-danger';
                errorMessage.textContent = data.message; // Use data.message to display error message
                passwordForm.appendChild(errorMessage);
    
                // Remove error message after a few seconds
                setTimeout(() => {
                    errorMessage.remove();
                }, 5000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});