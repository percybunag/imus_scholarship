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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/f2.css">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
    <title>Scholarship Portal | Forgot Password</title>


</head>
<body>
<section id="cover" class="cover-page d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="login-form text-center">
            <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="img-fluid mb-4" style="width: 100px;"><br>
            <h1 class="form-header">Find your Account?</h1><br>
            <p>We have already sent a recovery link to your email address. Kindly check it in order to change your password.</p>
            <a href="login.php" class="link-text">Back to Login Page</a>
            <div class="footertext text-center">
                <p>City of Imus | Office of Scholarship Program © 2024 All Rights Reserved Terms of Use and Privacy Policy</p>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
