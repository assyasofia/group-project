<?php
session_start();
// Padamkan data session cart supaya troli kembali kosong selepas pembelian berjaya
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Pixie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Animasi fade-in lembut untuk gaya aesthetic */
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

    <!-- Header / Navigation Bar -->
    <nav class="navbar navbar-expand-lg rhode-nav py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand rhode-brand m-0" href="home.html">Pixie</a>
            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto rhode-nav-links gap-3">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Customizer</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Bag</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.html">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Thank You Content -->
    <main class="container my-5 flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center text-center fade-in-up">
            <div class="col-md-6 col-lg-5">
                <div class="rhode-card p-5 shadow-sm bg-white rounded-5">
                    <!-- Icon Semak (Checkmark) Minimalis -->
                    <div class="mb-4 text-success d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-check-circle-fill text-muted" viewBox="0 0 16 16" style="color: #a37081 !important;">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                    </div>
                    
                    <h1 class="hero-title mb-3" style="font-size: 2.2rem;">thank you for purchasing</h1>
                    
                    <p class="rhode-instruction mb-5 px-3">
                        Your custom palette is being crafted by our magic pixies. A confirmation email with tracking details has been sent to your inbox.
                    </p>
                    
                    <!-- Butang Balik ke Home -->
                    <div>
                        <a href="home.html" class="btn btn-rhode-buy w-100 text-center d-block text-decoration-none">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 pixie cosmetics. all rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>