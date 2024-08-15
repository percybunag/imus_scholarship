<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page if not authenticated
    header("Location: login.php");
    exit();
}

// Check user role for access control
$user = $_SESSION['user'];
if ($user['role'] != 'User') {
    // Redirect to access denied page or another appropriate page
    header("Location: logout.php");
    exit();
}

    // Assuming session is already started and user is logged in
    $image_path = isset($_SESSION['user']['image_path']) ? $_SESSION['user']['image_path'] : 'default.jpg';
    $full_image_path = "../assets/scripts/uploads/profile_images/" . $image_path;

    

?>