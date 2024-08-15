<?php
include '../db_conn.php'; // Ensure you have a proper DB connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form
    $news_update = $_POST['aboutContent'];
    $scholarship_year = $_POST['scholarshipYear'];
    $scholarship_status = $_POST['scholarshipStatus'];

    try {
        // Prepare an SQL statement to update the system settings
        $sql = "UPDATE system_settings SET 
                    news_update = :news_update, 
                    municipal_scholarship_year = :scholarship_year, 
                    municipal_scholarship_status = :scholarship_status";

        $stmt = $pdo->prepare($sql);
        // Bind the parameters
        $stmt->bindParam(':news_update', $news_update, PDO::PARAM_STR);
        $stmt->bindParam(':scholarship_year', $scholarship_year, PDO::PARAM_STR);
        $stmt->bindParam(':scholarship_status', $scholarship_status, PDO::PARAM_STR);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Settings updated successfully!";
        } else {
            echo "Error updating settings.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirect back to settings page or show a success message
    header("Location: ../../../admin/settings.php?update=success");
    exit();
}
?>
