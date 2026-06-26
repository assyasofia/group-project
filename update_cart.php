<?php
session_start();
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['quantity'])) {
    $cart_id = intval($_POST['id']);
    $new_qty = intval($_POST['quantity']);
    $user = $_SESSION['user'] ?? $_SESSION['username'];

    if ($new_qty > 0) {
        $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("iis", $new_qty, $cart_id, $user);
        $stmt->execute();
        $stmt->close();
    }
}
header("Location: cart.php");
exit();
?>