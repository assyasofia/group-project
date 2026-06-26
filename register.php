<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixie - Customer Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f6f4ee; color: #333232; min-height: 100vh; display: flex; flex-direction: column; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 30px 8%; background-color: transparent; }
        .logo { font-family: 'Playfair Display', serif; font-size: 2rem; color: #333232; text-decoration: none; letter-spacing: -1px; }
        nav a { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px; color: #7c7774; text-decoration: none; margin-left: 30px; font-weight: 500; }
        nav a.active { color: #333232; }
        .container { flex: 1; display: flex; justify-content: center; align-items: center; padding: 20px; }
        .form-card { background: #ffffff; padding: 40px; border-radius: 24px; width: 100%; max-width: 450px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02); }
        .form-card h2 { font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1.5px; color: #7c7774; margin-bottom: 25px; font-weight: 600; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 8px; color: #333232; font-weight: 500; }
        .form-group input { width: 100%; padding: 14px 18px; border: 1px solid #e2ded6; background-color: #faf9f6; border-radius: 12px; font-family: inherit; font-size: 0.95rem; outline: none; }
        .form-group input:focus { border-color: #333232; background-color: #ffffff; }
        .btn-submit { width: 100%; padding: 16px; background-color: #333232; color: #ffffff; border: none; border-radius: 30px; font-family: inherit; font-size: 0.95rem; font-weight: 500; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background-color: #4a4848; }
        .form-footer { text-align: center; margin-top: 25px; font-size: 0.85rem; color: #7c7774; }
        .form-footer a { color: #333232; text-decoration: underline; font-weight: 500; }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">pixie</a>
        <nav>
            <a href="login.php">Login</a>
            <a href="register.php" class="active">Register</a>
        </nav>
    </header>
    <div class="container">
        <div class="form-card">
            <h2>01. Create Customer Account</h2>
<form action="pregister.php" method="POST">
    <div class="form-group">
        <label>Email Address:</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Full Name:</label>
        <input type="text" name="fullname" required>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="pass1" required>
    </div>
    <div class="form-group">
        <label>Confirm Password:</label>
        <input type="password" name="pass2" required>
    </div>
    <button type="submit" class="btn-submit">Create Account</button>
</form>
            <div class="form-footer">
                Already have an account? <a href="index.php">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>