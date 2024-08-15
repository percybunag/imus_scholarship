<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../lib/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imusscholarship_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'send_otp' || $action === 'resend_otp') {
        $email = $_POST['email'] ?? $_SESSION['email'];
        
        // In case of resend, no need to process password, just resend the OTP
        if ($action === 'send_otp') {
            $password = $_POST['password'];
            
            // Check if email already exists
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();
    
                if ($count > 0) {
                    echo json_encode(['status' => 'error', 'message' => 'Email is already registered.']);
                    exit;
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Database prepare statement error: ' . $conn->error]);
                exit;
            }
    
            // Store email and password in session
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
        }
    
        // Generate and store OTP in session
        $otp_code = rand(100000, 999999);
        $_SESSION['otp'] = $otp_code;
    
        $mail = new PHPMailer(true);
    
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = "percybunag.gg@gmail.com";
            $mail->Password = "jiin fvnb gseq qrnh";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            $mail->setFrom('do-not-reply@cityofimus.com', 'City of Imus Scholarship Program');
            $mail->addAddress($email);
    
            $mail->isHTML(true);
            $mail->Subject = 'One-time Password | Scholarship Portal';
            $mail->Body = '
            <div style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <img src="https://upload.wikimedia.org/wikipedia/en/7/74/Ph_seal_Imus.png" alt="Logo" style="width: 120px;">
                </div>
                <div style="text-align: center;">
                    <h2 style="color: #4CAF50; margin-bottom: 20px;">Your OTP Code</h2>
                    <p style="font-size: 16px; color: #555;">Dear User,</p>
                    <p style="font-size: 16px; color: #555;">Please use the OTP code below to complete your verification process.</p>
                    <div style="background-color: #f8f8f8; border: 1px solid #ddd; padding: 15px; margin: 20px 0; border-radius: 5px; font-size: 24px; font-weight: bold; color: #333;">
                        ' . $otp_code . '
                    </div>
                    <p style="font-size: 16px; color: #555;">If you did not request this code, please ignore this email.</p>
                    <p style="font-size: 14px; color: #aaa; margin-top: 30px;">City of Imus | Office of Scholarship Program © 2024 All Rights Reserved.</p>
                </div>
            </div>';
    
            $mail->send();
            echo json_encode(['status' => 'success']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    
        
    } elseif ($action === 'store_personal_info') {
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $unit_floor = $_POST['unit_floor'];
        $street_subdivision = $_POST['street_subdivision'];
        $barangay = $_POST['barangay'];
        $dob = $_POST['dob'];
        $contact_number = $_POST['contact_number'];
        $gender = $_POST['gender'];

        // Store personal info in session
        $_SESSION['first_name'] = $first_name;
        $_SESSION['middle_name'] = $middle_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['unit_floor'] = $unit_floor;
        $_SESSION['street_subdivision'] = $street_subdivision;
        $_SESSION['barangay'] = $barangay;
        $_SESSION['dob'] = $dob;
        $_SESSION['contact_number'] = $contact_number;
        $_SESSION['gender'] = $gender;

        echo json_encode(['status' => 'success']);
    } elseif ($action === 'verify_otp') {
        $otp = $_POST['otp'];

        if ($otp == $_SESSION['otp']) {
            $email = $_SESSION['email'];
            $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
            $first_name = $_SESSION['first_name'];
            $middle_name = $_SESSION['middle_name'];
            $last_name = $_SESSION['last_name'];
            $unit_floor = $_SESSION['unit_floor'];
            $street_subdivision = $_SESSION['street_subdivision'];
            $barangay = $_SESSION['barangay'];
            $dob = $_SESSION['dob'];
            $contact_number = $_SESSION['contact_number'];
            $gender = $_SESSION['gender'];
            $role = "User";
            $acc_status = "Active";

            // Insert user into database
            $stmt = $conn->prepare("INSERT INTO users (email, password, role, acc_status) VALUES (?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssss", $email, $password, $role, $acc_status);

                if ($stmt->execute()) {
                    $user_id = $stmt->insert_id;

                    $stmt = $conn->prepare("INSERT INTO personal_info (user_id, first_name, middle_name, last_name, unit_floor, street_subdivision, barangay, date_of_birth, contact_number, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("isssssssss", $user_id, $first_name, $middle_name, $last_name, $unit_floor, $street_subdivision, $barangay, $dob, $contact_number, $gender);

                        if ($stmt->execute()) {
                            unset($_SESSION['otp']);
                            unset($_SESSION['email']);
                            unset($_SESSION['password']);
                            unset($_SESSION['first_name']);
                            unset($_SESSION['middle_name']);
                            unset($_SESSION['last_name']);
                            unset($_SESSION['unit_floor']);
                            unset($_SESSION['street_subdivision']);
                            unset($_SESSION['barangay']);
                            unset($_SESSION['dob']);
                            unset($_SESSION['contact_number']);
                            unset($_SESSION['gender']);

                            echo json_encode(['status' => 'success']);
                        } else {
                            echo json_encode(['status' => 'error', 'message' => 'Personal info insertion error: ' . $stmt->error]);
                        }
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Prepare statement error: ' . $conn->error]);
                    }

                    $stmt->close();
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'User insertion error: ' . $stmt->error]);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Prepare statement error: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid OTP.']);
        }
    }
}

$conn->close();
?>
