<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to logout script if not authenticated
    header("Location: ../assets/scripts/logout.php");
    exit();
}

include '../assets/scripts/connection/db_conn.php';

// Fetch user details from the database using the user_id stored in the session
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("
    SELECT 
        u.id, u.email, u.role, u.acc_status, u.created_at,
        p.first_name, p.middle_name, p.last_name, p.unit_floor, p.street_subdivision, p.barangay, p.date_of_birth, p.contact_number, p.gender,
        d.image_path
    FROM 
        users u
    LEFT JOIN 
        personal_info p ON u.id = p.user_id
    LEFT JOIN 
        user_dp d ON u.id = d.user_id
    WHERE 
        u.id = :user_id
");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$detail = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user was found and their role is appropriate
if (!$detail || ($detail['role'] != 'User')) {
    // Redirect to logout script if the role is not appropriate
    header("Location: ../assets/scripts/logout.php");
    exit();
}

// Determine the image path
$image_path = $detail['image_path'] ? $detail['image_path'] : 'default.jpg';
$full_image_path = "../assets/scripts/uploads/profile_images/" . $image_path;
?>
