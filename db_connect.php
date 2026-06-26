<?php
// ==========================================================================
// DB_CONNECT.PHP - SAMBUNGAN PANGKALAN DATA
// ==========================================================================

$servername = "localhost";
$username = "root";       
$password = "";           
$dbname = "pixie_db";     

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>