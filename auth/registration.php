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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Portal | Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
</head>
<body>
    <section id="cover" class="cover-page d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Logo and text for larger screens -->
                <div class="col-12 col-md-6 d-none d-sm-flex align-items-center mb-4">
                    <div class="me-3">
                        <a href="../index.php">
                            <img src="../assets/img/Ph_seal_Imus.png" alt="City Seal" class="img-fluid" style="width: 100px;">
                        </a>
                    </div>
                    <div class="text-start">
                        <h4>CITY GOVERNMENT OF IMUS</h4>
                        <h4>SCHOLARSHIP PROGRAM</h4>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="container mt-5 form-container">
                        <div class="card">
                            <!-- Logo and text for smaller screens -->
                            <div class="logo-header text-center d-block d-sm-none">
                                <a href="../index.php">
                                    <img src="../assets/img/Ph_seal_Imus.png" alt="City Seal" class="img-fluid">
                                </a>
                                <h4>CITY GOVERNMENT OF IMUS</h4>
                                <h4>SCHOLARSHIP PROGRAM</h4>
                            </div>
                            <div class="card-body">
                                <form id="registration-form">
                                    <!-- Step 1: Login Information -->
                                    <div id="step-1" class="step">
                                        <h3 class="header-reg text-start mt-4">Registration</h3>
                                        <p class="step-text text-start">Step 1</p>
                                        <div class="mb-3">
                                            <label for="email" class="form-label text-start">Email Address:</label>
                                            <input type="email" id="email" name="email" class="form-control" required>
                                            <div id="email-error" class="alert alert-danger" style="display: none;"></div>
                                            <div id="otp-alert" class="alert alert-danger"></div>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" id="password" name="password" class="form-control" required>
                                            <i class="fas fa-eye position-absolute" id="togglePassword" style="cursor: pointer;"></i>
                                            <div id="password-error" class="alert alert-danger" style="display: none;"></div>
                                            <p class="link-text text-end mt-3">Already have an account? <a href="login.php">Sign in here</a></p>
                                        </div>
                                        <button type="button" class="btn btn-primary mb-4" onclick="sendOtp()">Continue</button>
                                    </div>
                                    <!-- Step 2: Personal Information -->
                                    <div id="step-2" class="step">
                                        <h3 class="header-reg text-start mt-4">Registration</h3>
                                        <p class="step-text text-start">Step 2</p>
                                        <div class="row mt-4">
                                            <div class="col-md-4 mb-3">
                                                <label for="first-name" class="form-label">First Name:</label>
                                                <input type="text" id="first-name" name="first-name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="middle-name" class="form-label">Middle Name:</label>
                                                <input type="text" id="middle-name" name="middle-name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="last-name" class="form-label">Last Name:</label>
                                                <input type="text" id="last-name" name="last-name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="unit-floor" class="form-label">Unit/Floor:</label>
                                                <input type="text" id="unit-floor" name="unit-floor" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="street-subdivision" class="form-label">Street/Subdivision:</label>
                                                <input type="text" id="street-subdivision" name="street-subdivision" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="barangay" class="form-label">Barangay:</label>
                                                <input type="text" id="barangay" name="barangay" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="dob" class="form-label">Date of Birth:</label>
                                                <input type="date" id="dob" name="dob" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="contact-number" class="form-label">Contact Number:</label>
                                                <input type="text" id="contact-number" name="contact-number" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="gender" class="form-label">Gender:</label>
                                                <select id="gender" name="gender" class="form-control" required>
                                                    <option value="" disabled selected>Select Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <p class="link-text text-end mt-3">Already have an account? <a href="#">Sign in here</a></p>
                                        <button type="button" class="btn btn-secondary mx-2 mb-4" onclick="prevStep(1)">Back</button>
                                        <button type="button" class="btn btn-primary mx-2 mb-4" onclick="storePersonalInfo()">Continue</button>
                                        <div id="personal-info-error" class="alert alert-danger mb-4" style="display: none;"></div>
                                    </div>
                                    <!-- Step 3: OTP -->
                                    <div id="step-3" class="step">
                                        <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="img-fluid mb-4" style="width: 100px;"><br>
                                        <h4 class="form-header">OTP Verification</h4>
                                        <p>Enter OTP Code sent to your email address.</p>
                                        <div class="d-flex justify-content-between my-1">
                                            <input type="text" id="otp1" class="otp-input form-control text-center" maxlength="1" required>
                                            <input type="text" id="otp2" class="otp-input form-control text-center" maxlength="1" required>
                                            <input type="text" id="otp3" class="otp-input form-control text-center" maxlength="1" required>
                                            <input type="text" id="otp4" class="otp-input form-control text-center" maxlength="1" required>
                                            <input type="text" id="otp5" class="otp-input form-control text-center" maxlength="1" required>
                                            <input type="text" id="otp6" class="otp-input form-control text-center" maxlength="1" required>
                                        </div>
                                        <div id="resend-otp-alert" class="alert alert-info mb-4"></div>
                                        <div class="otp-container mt-3">
                                            <p class="otp-statement">Doesn't receive OTP code?</p>
                                            <button type="button" class="btn btn-link mt-2" onclick="resendOtp()">Resend OTP</button>
                                        </div>
                                        <button type="button" class="btn btn-secondary mx-2 mb-4 hidden" onclick="prevStep(2)">Previous</button>
                                        <button type="button" class="btn btn-primary mx-2 mb-4" onclick="verifyOtp()">Submit</button>

                                        <div id="otp-error" class="alert alert-danger mb-4"></div>
                                    </div>
                                    <!-- Step 4: Registration Successful -->
                                    <div id="step-4" class="step">
                                        <div class="text-center">
                                            <h1 class="display-4 text-success">Registration Successful!</h1>
                                            <p class="lead">Thank you for registering. You can now log in to your account.</p>
                                            <a href="login.php" class="btn btn-primary mt-4">Go to Login</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="footertext text-center mt-4">
                                    <p>City of Imus | Office of the Scholarship Program © 2024</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/registration.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
