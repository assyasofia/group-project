<?php
session_start();
include("db_connect.php");

// Pastikan user sudah login (menggunakan sistem session anda)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['user'];
    $config_type = $_POST['config_type']; // Contoh: 4 atau 9
    $shades_data = $_POST['shades_data']; // Data warna dalam bentuk JSON

    // Simpan ke dalam table 'cart'
    $stmt = $conn->prepare("INSERT INTO cart (user_id, config_type, shades_data) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $user, $config_type, $shades_data);
    
    if ($stmt->execute()) {
        // Berjaya, redirect ke cart.php
        header("Location: cart.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>