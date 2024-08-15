<?php
// Include database connection
include '../connection/db_conn.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user data from the POST request
    $userId = $_POST['userId'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $unitFloor = $_POST['unitFloor'];
    $streetSubdivision = $_POST['streetSubdivision'];
    $barangay = $_POST['barangay'];

    try {
        // Start transaction
        $pdo->beginTransaction();

        // Update the personal_info table
        $sqlPersonalInfo = "
            UPDATE personal_info 
            SET 
                first_name = :firstName, 
                middle_name = :middleName, 
                last_name = :lastName, 
                date_of_birth = :dob, 
                gender = :gender, 
                contact_number = :contactNumber, 
                unit_floor = :unitFloor, 
                street_subdivision = :streetSubdivision, 
                barangay = :barangay
            WHERE user_id = :userId
        ";

        $stmtPersonalInfo = $pdo->prepare($sqlPersonalInfo);
        $stmtPersonalInfo->execute([
            ':firstName' => $firstName,
            ':middleName' => $middleName,
            ':lastName' => $lastName,
            ':dob' => $dob,
            ':gender' => $gender,
            ':contactNumber' => $contactNumber,
            ':unitFloor' => $unitFloor,
            ':streetSubdivision' => $streetSubdivision,
            ':barangay' => $barangay,
            ':userId' => $userId
        ]);

        // Update the users table
        $sqlUsers = "
            UPDATE users
            SET 
                email = :email
            WHERE id = :userId
        ";

        $stmtUsers = $pdo->prepare($sqlUsers);
        $stmtUsers->execute([
            ':email' => $email,
            ':userId' => $userId
        ]);

        // Commit transaction
        $pdo->commit();

        echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully.']);
    } catch (Exception $e) {
        // Rollback transaction on error
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
