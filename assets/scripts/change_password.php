<?php
session_start();
include '../scripts/connection/db_conn.php';

$response = array('success' => false, 'message' => '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['Password'];
    $newPassword = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-Password'];

    if ($newPassword !== $confirmPassword) {
        $response['message'] = 'New passwords do not match.';
    } else {
        $userId = $_SESSION['user_id'];

        // Check if current password is correct
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        $user = $stmt->fetch();

        if (!password_verify($currentPassword, $user['password'])) {
            $response['message'] = 'Current password is incorrect.';
        } else {
            // Update to new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':id', $userId);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Password changed successfully.';
            } else {
                $response['message'] = 'Error updating password.';
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
