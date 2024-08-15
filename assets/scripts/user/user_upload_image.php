<?php
session_start();
include '../db_conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $allowed_types = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $file_name = $_FILES["profile_image"]["name"];
        $file_type = $_FILES["profile_image"]["type"];
        $file_size = $_FILES["profile_image"]["size"];

        // Validate file type
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed_types)) {
            $_SESSION['upload_error'] = "Error: Please select a valid file format.";
            header("Location: ../../../user/userprofile.php");
            exit();
        }

        // Validate file size - 5MB maximum
        $max_size = 5 * 1024 * 1024;
        if ($file_size > $max_size) {
            $_SESSION['upload_error'] = "Error: File size is larger than the allowed limit.";
            header("Location: ../../../user/userprofile.php");
            exit();
        }

        // Define the correct target directory
        $target_dir = "../uploads/profile_images";
        $new_file_name = uniqid() . "." . $ext;
        $target_file = $target_dir . $new_file_name;

        // Check if the directory exists, if not, create it
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
            // Check if the user already has an entry in the user_dp table
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM user_dp WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $exists = $stmt->fetchColumn();

            if ($exists) {
                // Update the user's profile image file name
                $stmt = $pdo->prepare("UPDATE user_dp SET image_path = :image_path WHERE user_id = :user_id");
            } else {
                // Insert a new entry if none exists
                $stmt = $pdo->prepare("INSERT INTO user_dp (user_id, image_path) VALUES (:user_id, :image_path)");
            }

            // Store only the file name in the database
            $stmt->bindParam(':image_path', $new_file_name);
            $stmt->bindParam(':user_id', $user_id);

            if ($stmt->execute()) {
                // Update the session with the new image file name
                $_SESSION['user']['image_path'] = $new_file_name;
                
                // Redirect or inform the user of the successful upload
                header("Location: ../../../user/userprofile.php");
                exit();
            } else {
                $_SESSION['upload_error'] = "Error updating the image in the database.";
                header("Location: ../../../user/userprofile.php");
                exit();
            }
        } else {
            $_SESSION['upload_error'] = "Error: There was a problem uploading your file.";
            header("Location: ../../../user/userprofile.php");
            exit();
        }
    } else {
        $_SESSION['upload_error'] = "Error: " . $_FILES["profile_image"]["error"];
        header("Location: ../../../user/userprofile.php");
        exit();
    }
}
?>
