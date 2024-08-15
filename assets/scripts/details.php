<?php
include 'db_conn.php';
session_start();
    $userid = $_SESSION['user']['id'];
    $stmt = $pdo->prepare("
        SELECT * from personal_info
        WHERE id = :id
    ");
    $stmt->bindParam(':id', $userid);
    $stmt->execute();
    $details = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['details'] = $details;

?>