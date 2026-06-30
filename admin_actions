<?php
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// ==================================================================
// BACK-END PROTECTION: Sekat jika bukan staf/admin
// ==================================================================
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit();
}
// ==================================================================

include("db_connect.php");

if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    $sql = "DELETE FROM orders WHERE order_id = '$delete_id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php?status=success_delete");
        exit();
    } else {
        echo "<script>alert('Error dropping record: " . mysqli_error($conn) . "'); window.location.href='admin.php';</script>";
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
}
?>
