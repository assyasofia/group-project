<?php
session_start();

// Set 
$config = isset($_SESSION['selected_config']) ? $_SESSION['selected_config'] : '9';

// Pricing
if ($config == '4') {
    $product_title = "custom pixie palette (4 slots)";
    $product_img = "photos/fourslots.PNG";
    $subtotal = 80.00;
    $discount = 11.00; // 20% from RM55
} else {
    $product_title = "custom pixie palette (9 slots)";
    $product_img = "photos/nineslots.png";
    $subtotal = 180.00;
    $discount = 17.00; // 20% from RM85
}

$total = $subtotal - $discount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bag | Pixie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

    <nav class="navbar navbar-expand-lg rhode-nav py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand rhode-brand m-0" href="home.html">Pixie</a>
            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto rhode-nav-links gap-3">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Customizer</a></li>
                    <li class="nav-item"><a class="nav-link active" href="cart.php">Bag</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.html">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        <h1 class="hero-title mb-5 text-center" style="font-size: 2.5rem;">your bag</h1>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-7">
                <div class="rhode-card p-4 mb-3">
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                        <h5 class="rhode-label mb-0">Product Details</h5>
                        <h5 class="rhode-label mb-0">Total</h5>
                    </div>

                    <div class="row align-items-center mb-4">
                        <div class="col-3 col-md-2">
                            <img src="<?php echo $product_img; ?>" alt="Custom Palette" class="img-fluid rounded bg-light p-1">
                        </div>
                        <div class="col-6 col-md-7">
                            <h6 class="fw-semibold mb-1 text-lowercase" style="font-size: 1rem;"><?php echo $product_title; ?></h6>
                            <p class="text-muted mb-0 small">shades custom configuration built successfully.</p>
                            <a href="index.php" class="text-decoration-underline small text-muted text-lowercase d-inline-block mt-2">edit shades</a>
                        </div>
                        <div class="col-3 text-end">
                            <span class="fw-medium">RM <?php echo number_format($subtotal, 2); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="rhode-card p-4 p-md-5">
                    <h5 class="rhode-label mb-4">Order Summary</h5>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted small">Subtotal</span>
                        <span class="fw-medium">RM <?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted small">Shipping</span>
                        <span class="text-success small">FREE</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4 border-bottom pb-3">
                        <span class="text-muted small">Discount (20% off Bundle)</span>
                        <span class="text-danger small">- RM <?php echo number_format($discount, 2); ?></span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-5 align-items-center">
                        <span class="fw-semibold text-uppercase small" style="letter-spacing: 0.05em;">Total</span>
                        <span class="fw-bold" style="font-size: 1.3rem; color: #333232;">RM <?php echo number_format($total, 2); ?></span>
                    </div>

                    <a href="thankyou.php" class="btn btn-rhode-buy w-100 text-uppercase text-center text-decoration-none d-block" style="letter-spacing: 0.1em; font-size: 0.8rem;">Proceed to Checkout</a>
                    
                    <a href="index.php" class="text-center d-block mt-3 text-muted text-decoration-none small text-lowercase">continue customizing</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 rhode skin. all rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>