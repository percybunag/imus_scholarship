<?php
// Database connection settings
$host = 'localhost'; // or your host
$db = 'imusscholarship_db'; // replace with your database name
$user = 'root'; // replace with your database username
$pass = ''; // replace with your database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}
?>