<?php
session_start();
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $password = $_POST['password'];

    // Check if the email already exists in the database
    $check_email = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        // If email exists, show an alert and redirect back to the registration page 
        echo "<script>alert('This email has existed. Please use another email.'); window.history.back();</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (strpos($email, '@pixie.com') !== false) {
        $assigned_role = 'admin'; // Disimpan sebagai staff/admin
    } else {
        $assigned_role = 'user';  // Disimpan sebagai pelanggan biasa
    }

    $sql = "INSERT INTO users (email, fullname, password, role) VALUES ('$email', '$fullname', '$hashed_password', '$assigned_role')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>
