<?php
// Include database connection
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Update user role and status
    $sql = "UPDATE users SET role = :role, acc_status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':role' => $role,
        ':status' => $status,
        ':id' => $userId
    ]);

    // Redirect back to the users page or show a success message
    header('Location: ../../../admin/users.php');
    exit();
}
?>
