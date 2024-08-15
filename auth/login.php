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

include '../assets/scripts/process_login.php';
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
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Scholarship Portal | Login</title>
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">

</head>

<body>
    <section id="cover" class="cover-page d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <!-- Logo and text for larger screens -->
                <div class="col-12 col-md-7 d-none d-sm-flex align-items-center mb-4">
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
                <div class="col-12 col-md-5">
                    <div class="login-form mx-auto">
                        <!-- Logo and text for smaller screens -->
                        <div class="logo-header text-center d-block d-sm-none mb-4">
                            <a href="../index.php">
                                <img src="../assets/img/Ph_seal_Imus.png" alt="City Seal" class="img-fluid">
                            </a>
                            <h4>CITY GOVERNMENT OF IMUS</h4>
                            <h4>SCHOLARSHIP PROGRAM</h4>
                        </div>
                        <h2 class="form-header mb-2">User Login</h2>
                        <div class="cacc text-start mb-4">
                            <p class="fpasstext">Don't have account? <a href="registration.php">Create an Account</a></p>
                        </div>

                        <form action="login.php" method="POST">

                            <div class="mb-2">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="fpass text-end">
                                <p class="fpasstext">Forgot Account? <a href="forgotpass.php">Retrieve Here!</a></p>
                            </div>
                            <div class="divider d-none">or</div>
                            <div class="social-buttons mt-3">
                                <button class="btn btn-google mb-2 d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 326667 333333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M326667 170370c0-13704-1112-23704-3518-34074H166667v61851h91851c-1851 15371-11851 38519-34074 54074l-311 2071 49476 38329 3428 342c31481-29074 49630-71852 49630-122593m0 0z" fill="#4285f4" />
                                        <path d="M166667 333333c44999 0 82776-14815 110370-40370l-52593-40742c-14074 9815-32963 16667-57777 16667-44074 0-81481-29073-94816-69258l-1954 166-51447 39815-673 1870c27407 54444 83704 91852 148890 91852z" fill="#34a853" />
                                        <path d="M71851 199630c-3518-10370-5555-21482-5555-32963 0-11482 2036-22593 5370-32963l-93-2209-52091-40455-1704 811C6482 114444 1 139814 1 166666s6482 52221 17777 74814l54074-41851m0 0z" fill="#fbbc04" />
                                        <path d="M166667 64444c31296 0 52406 13519 64444 24816l47037-45926C249260 16482 211666 1 166667 1 101481 1 45185 37408 17777 91852l53889 41853c13520-40185 50927-69260 95001-69260z" fill="#ea4335" />
                                    </svg>
                                    Sign in with Google
                                </button>
                                <button class="btn btn-facebook mb-2 d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05-4.418 0-8 3.604-8 8.05 0 3.998 2.938 7.32 6.75 7.951v-5.625H4.897V8.05h1.855V6.275c0-1.836 1.067-2.851 2.697-2.851.779 0 1.596.14 1.596.14v1.761H9.868c-.899 0-1.177.558-1.177 1.127V8.05h1.998l-.319 2.325H8.691V16c3.812-.631 6.75-3.953 6.75-7.951z" />
                                    </svg>
                                    Sign in with Facebook
                                </button>

                            </div>
                            <?php if (!empty($error)) : ?>
                                <div class="alert alert-danger" id="message"role="alert">
                                    <?= $error ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex justify-content-center mb-5">
                                <button type="submit" class="btn btn-login my-4">Sign in</button>
                            </div>
                            <div class="footertext text-center">
                                <p>City of Imus | Office of the Scholarship Program © 2024</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordField = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>
