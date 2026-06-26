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
        
        // Semak password guna fungsi khas
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak dijumpai!');</script>";
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
    <style>
        body { background-color: #f6f4ee; display: flex; flex-direction: column; min-height: 100vh; }
        .container { flex: 1; display: flex; justify-content: center; align-items: center; }
        .form-card { background: #ffffff; padding: 40px; border-radius: 24px; width: 100%; max-width: 450px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-submit { width: 100%; padding: 14px; background: #333232; color: #fff; border: none; border-radius: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <h2 class="mb-4 text-center">Customer Sign-In</h2>
            
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label> Email Address:</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn-submit">Sign In</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php" style="color:#333232;">New to Pixie? Create an account</a>
            </div>
        </div>
    </div>
</body>
</html>
