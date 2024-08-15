<?php
// Include database connection
include 'connection/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query to get user details
    $stmt = $pdo->prepare("
        SELECT 
            u.id, u.email, u.password, u.role, u.acc_status
        FROM 
            users u
        WHERE 
            u.email = :email
    ");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Check if the account is active
        if ($user['acc_status'] !== 'Active') {
            $error = "Not an active account. Please contact administrator.";
        } else {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Start a session and store only the user ID in session variables
                session_start();
                $_SESSION['user_id'] = $user['id'];

                // Redirect based on role
                if ($user['role'] == 'Admin' || $user['role'] == 'System Admin') {
                    header("Location: ../admin/dashboard.php");
                } else {
                    header("Location: ../user/dashboard.php");
                }
                exit();
            } else {
                // Handle invalid password
                $error = "Invalid password.";
            }
        }
    } else {
        // Handle unregistered email
        $error = "Email is not registered.";
    }
}
?>
