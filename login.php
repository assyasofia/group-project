<?php
session_start();
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Check if the password matches
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];

        // --- COMPANY EMAIL CHECK ---
            // example staff domain: @pixie.com 
            if (strpos($email, '@pixie.com') !== false) {
                $_SESSION['role'] = 'admin'; // Set as staff role
                
                mysqli_query($conn, "UPDATE users SET role='admin' WHERE email='$email'");
                
                header("Location: admin.php"); // Staff terus dibawa ke Admin Panel
            } else {
                $_SESSION['role'] = 'user';  // Set sebagai customer biasa
                header("Location: home.php");
            }
            exit();
            
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('Email cannot be found!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Pixie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Jost', sans-serif; background-color: #F7F4EF; color: #2E2E2E; }
        .login-card { max-width: 450px; margin: 100px auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
        .btn-pixie { background-color: #2E2E2E; color: white; border-radius: 20px; padding: 10px 25px; border: none; }
        .btn-pixie:hover { background-color: #555; color: white; }
    </style>
</head>
<body>

    <div class="container">
        <div class="login-card">
            <h3 class="text-center mb-4" style="font-family: serif; font-style: italic;">Pixie Sign In</h3>
            
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label small text-uppercase tracking-wide"> Email Address:</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small text-uppercase tracking-wide">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-pixie w-100 text-uppercase mt-2">Sign In</button>
                <p class="text-center mt-3 small text-muted">New to Pixie? <a href="register.php" class="text-dark">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
