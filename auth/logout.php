<?php
session_start();
session_unset();
session_destroy(); // Padam semua data login user

header("Location: login.php");
exit();
?>