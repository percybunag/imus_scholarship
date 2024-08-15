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
include '../assets/scripts/connection/db_conn.php';
require '../lib/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $mailrequest = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($mailrequest, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format";
    } else {
        $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute(['email' => $mailrequest]);

        if ($stmt->rowCount() > 0) {
            $token = bin2hex(random_bytes(50));
            $insert_token = $pdo->prepare("INSERT INTO password_resets (email, token) VALUES (:email, :token)");
            $insert_token->execute(['email' => $mailrequest, 'token' => $token]);

            $reset_link = "http://localhost/imus_scholarship/auth/f3.php?token=" . $token;

            $message = '
            <div style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4; border-radius: 10px;">
                <div style="text-align: center; padding-bottom: 20px;">
                    <img src="https://upload.wikimedia.org/wikipedia/en/7/74/Ph_seal_Imus.png" alt="City of Imus Scholarship Program" style="width: 150px;">
                </div>
                <div style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="color: #007bff; text-align: center;">Password Reset Request</h2>
                    <p style="font-size: 16px; line-height: 1.6;">Hello,</p>
                    <p style="font-size: 16px; line-height: 1.6;">You are receiving this email because we received a password reset request for your account.</p>
                    <p style="text-align: center; margin: 30px 0;">
                        <a href="' . $reset_link . '" style="background-color: #007bff; color: #fff; text-decoration: none; padding: 15px 25px; border-radius: 5px; font-size: 18px; font-weight: bold; display: inline-block;">Reset Password</a>
                    </p>
                    <p style="font-size: 16px; line-height: 1.6;">If you did not request a password reset, please ignore this email. Your password will remain unchanged.</p>
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    <p style="font-size: 14px; color: #777;">City of Imus | Office of Scholarship Program © 2024 All Rights Reserved</p>
                    <p style="font-size: 12px; color: #999;">Terms of Use | Privacy Policy</p>
                </div>
            </div>';
            
            

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->Username = "percybunag.gg@gmail.com";
            $mail->Password = "jiin fvnb gseq qrnh";
            $mail->FromName = "City of Imus Scholarship Program";
            $mail->AddAddress($mailrequest);
            $mail->Subject = "Reset Password";
            $mail->isHTML(true);
            $mail->Body = $message;

            if ($mail->send()) {
                header('Location: ../auth/f2.php'); 
                exit();
            } else {
                $msg = "Mailer Error: " . $mail->ErrorInfo;
            }
        } else {
            $msg = "We can't find a user with that email address";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/forgot1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
    <title>Scholarship Portal | Forgot Password</title>
    <link rel="icon" href="../assets/img/Ph_seal_Imus.png">
</head>
<body>
<section id="cover" class="cover-page d-flex justify-content-center align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div class="login-form text-center">
            <img src="../assets/img/Ph_seal_Imus.png" alt="Logo" class="img-fluid" style="width: 100px;">
            <h1 class="form-header">Find your Account?</h1>
            <p>Please enter your email address so we can send a recovery code to your account</p>
            <form method="post">
                    <div class="input-group">
                        <label class="form-label">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="button-container d-flex justify-content-end align-items-end my-3">
                        <a href="login.php" class="Btn1 btn btn-secondary me-2">Cancel</a>
                        <button type="submit" name="submit" class="Btn2 btn btn-primary">Search</button>
                    </div>
                </form>
            <div class="footertext text-center">
                <p>City of Imus | Office of Scholarship Program © 2024 All Rights Reserved Terms of Use and Privacy Policy</p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
