<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Pixie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
    body { font-family: 'Jost', sans-serif; background-color: #F7F4EF; color: #2E2E2E; }
        .register-card { max-width: 450px; margin: 80px auto; background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
        .btn-pixie { background-color: #2E2E2E; color: white; border-radius: 20px; padding: 10px 25px; border: none; }
        .btn-pixie:hover { background-color: #555; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="register-card">
        <h3 class="text-center mb-4" style="font-family: serif; font-style: italic;">Create Pixie Account</h3>
        
        <?php if (isset($message) && !empty($message)): ?>
            <?php echo $message; ?>
        <?php endif; ?>

        <form action="pregister.php" method="POST">
            <div class="mb-3">
                <label class="form-label small text-uppercase tracking-wide">Full Name</label>
                <input type="text" name="fullname" class="form-control" required placeholder="e.g. Aleeya">
            </div>
            <div class="mb-3">
                <label class="form-label small text-uppercase tracking-wide">Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="name@domain.com">
            </div>
            <div class="mb-3">
                <label class="form-label small text-uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-pixie w-100 text-uppercase mt-2">Register</button>
            <p class="text-center mt-3 small text-muted">Already have an account? <a href="login.php" class="text-dark">Login here</a></p>
        </form>
    </div>
</div>

</body>
</html>
