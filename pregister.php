<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    // 1. Semak jika emel sudah wujud dalam database
    $check_email = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        // Jika emel dijumpai, tunjukkan mesej ini
        echo "<script>alert('This email has existed. Please use another email.'); window.history.back();</script>";
        exit();
    }

    // 2. Jika emel tiada, teruskan pendaftaran
    if ($pass1 !== $pass2) {
        echo "<script>alert('Password tidak sama!'); window.history.back();</script>";
        exit();
    }

    $hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, fullname, password, role) VALUES ('$email', '$fullname', '$hashed_password', 'user')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pendaftaran Berjaya!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>