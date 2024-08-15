<?php
include 'db_conn.php'; // This should define the $pdo variable

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $query = $pdo->prepare("SELECT email FROM password_resets WHERE token = :token");
    $query->execute(['token' => $token]);
    $msg = "";

    if ($query->rowCount() > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $email = $row['email'];

        if (isset($_POST['submit'])) {
            $new_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {

                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                // Update the password
                $update_password = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
                if ($update_password->execute(['password' => $hashed_password, 'email' => $email])) {
                    // Delete the token after successful password reset
                    $delete_token = $pdo->prepare("DELETE FROM password_resets WHERE email = :email");
                    $delete_token->execute(['email' => $email]);

                    echo "Password reset successfully!";
                    // Redirect to login page
                    header('Location: login.php');
                    exit();
                } else {
                    echo "Error updating password.";
                }
            } else {
                echo "Passwords do not match.";
            }
        }
    } else {
        $msg = "Invalid or expired token.";
    }
} else {
    $msg = "No token provided.";
}
?>