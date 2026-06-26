<?php
// 1. Mulakan session untuk mengakses data user
session_start();

// 2. Kosongkan semua data dalam $_SESSION
$_SESSION = array();

// 3. Musnahkan session tersebut
session_destroy();

// 4. Halakan pengguna ke login.php atau index.php
header("Location: login.php");
exit();
?>