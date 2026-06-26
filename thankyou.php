<?php
session_start();

// SECURITY CHECK: Sila pastikan user dah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// SAMBUNGAN DATABASE
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixie_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$user = $_SESSION['user'];

// PROSES PADAM ITEM YANG TELAH DIBELI DARIPADA DATABASE CART
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_items'])) {
    $selected_items = $_POST['selected_items'];
    
    foreach ($selected_items as $item_id) {
        // Padam berdasarkan ID barang dan username untuk keselamatan
        $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->bind_param("is", $item_id, $user);
        $stmt->execute();
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Order | Pixie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg rhode-nav py-4">
        <div class="container text-center">
            <a class="navbar-brand rhode-brand m-auto" href="home.php">Pixie</a>
        </div>
    </nav>

    <!-- THANK YOU MESSAGE CARD -->
    <div class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center m-0">
            <div class="col-md-6 p-0">
                <div class="rhode-card p-5 text-center shadow-sm">
                    <span class="fs-1">✨</span>
                    <h2 class="my-3" style="font-family: 'Fraunces', serif; font-weight: 300;">Thank You for Your Order!</h2>
                    <p class="text-muted mb-5" style="font-family: 'Jost', sans-serif; font-size: 0.95rem;">Your custom palette configuration has been successfully submitted and is ready for production.</p>
                    
                    <!-- BUTANG KEMBALI KE HOME -->
                    <a href="home.php" class="btn btn-rhode-buy px-5 py-3 text-uppercase" style="font-size: 0.85rem; letter-spacing: 0.05em;">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 pixie cosmetics. all rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>