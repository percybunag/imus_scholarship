<?php

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    if ($role == 'Admin' || $role == 'System Admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../user/dashboard.php");
    }
    exit();
}

include '../assets/scripts/f3_process.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/forgot3.css">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
    <title>Scholarship Portal | Forgot Password</title>



</head>
<body>
<section id="cover" class="cover-page d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="changeform text-center">
            <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="img-fluid mb-2" style="width: 100px;"><br>
            <h1 class="form-header">Password Reset</h1>
            <div class="container text-start">
                <form id="resetForm" method="post">
                <div class="mb-3 input-group position-relative">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password position-absolute"></span>
                </div>
                <div class="mb-3 input-group position-relative">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password position-absolute"></span>
                </div>
                <div class="button-container d-flex justify-content-center align-items-end-3 m-5">
                        <button type="submit" name="submit" class="Btn2 btn btn-primary">Change Password</button>
                </div>
                <p id="error-message" class="error text-center"></p>
                </form>
            </div>
            <div class="footertext text-center">
                <p>City of Imus | Office of Scholarship Program © 2024 <br>All Rights Reserved Terms of Use and Privacy Policy</p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function() {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.classList.remove('fa-eye');
                this.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.classList.remove('fa-eye-slash');
                this.classList.add('fa-eye');
            }
        });
    });

    // Form validation
    document.getElementById('resetForm').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('error-message');

        // Regex for password validation
        const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\W_]).{8,}$/;

        // Clear previous error messages
        errorMessage.textContent = '';

        // Validate password
        if (!passwordPattern.test(password)) {
            errorMessage.textContent = "Password must be at least 8 characters long and include at least one number, one lowercase letter, one uppercase letter, and one special character.";
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Check if passwords match
        if (password !== confirmPassword) {
            errorMessage.textContent = "Passwords do not match.";
            event.preventDefault(); // Prevent form submission
        }
    });
</script>
</body>
</html>
