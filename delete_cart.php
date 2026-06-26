<?php
session_start();
include("db_connect.php");

// 1. Dapatkan identiti pengguna yang sedang login (sama seperti dalam cart.php)
if (isset($_SESSION['user'])) {
    $user_identifier = $_SESSION['user'];
} elseif (isset($_SESSION['username'])) {
    $user_identifier = $_SESSION['username'];
} else {
    // Jika tidak login, jangan buat apa-apa
    header("Location: login.php");
    exit();
}

// 2. Padam berdasarkan ID barang DAN user_identifier (nama/id yang disimpan di DB)
if (isset($_GET['id'])) {
    $cart_id = intval($_GET['id']);

    // Pastikan column dalam DB anda adalah user_id
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("is", $cart_id, $user_identifier);
    $stmt->execute();
    $stmt->close();
}

// 3. Kembali ke cart
header("Location: cart.php");
exit();
?>