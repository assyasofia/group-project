<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../config/database.php"); // Fixed file name here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['username'];
            echo "<script>alert('Login successful!'); window.location.href='../index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Wrong password!'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='login.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SchoolSystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-slate { background-color: #1e293b !important; }
        .text-slate { color: #1e293b !important; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-slate shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../index.php">🏫 SchoolSystem</a>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 border-0 shadow-sm bg-white rounded-3">
                <h3 class="fw-bold text-slate mb-4 text-center">Account Login</h3>
                
                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-medium text-secondary">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-medium text-secondary">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 fw-bold bg-slate border-0 py-2">Login</button>
                </form>

                <hr class="my-4 text-secondary opacity-25">
                <p class="text-center small text-muted mb-0">Don't have an account? <a href="register.php" class="text-decoration-none fw-bold">Register here</a></p>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-secondary text-center py-3 mt-auto border-top border-secondary border-opacity-25">
        <div class="container">
            <p class="mb-0 small">&copy; 2026 School System Project. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>