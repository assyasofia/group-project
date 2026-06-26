<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixie | Build Your Own Palette</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

<?php include("header.php"); ?>

<main class="container my-5 flex-grow-1 d-flex align-items-center position-relative">
    <div class="ribbon-gift" style="z-index: 1;">
        <span>limited Edition</span>
    </div>

    <div class="row g-5 w-100 justify-content-center align-items-center m-0" style="position: relative; z-index: 5;">
        <div class="col-md-6 d-flex flex-column align-items-center">
            <div class="hero-banner-frame p-4 bg-white rounded-5 shadow-sm d-flex justify-content-center align-items-center" style="min-height: 400px; width: 100%; max-width: 450px;">
                <img src="photos/front.png" alt="Pixie Palette Showcase" class="img-fluid hero-image" style="max-height: 350px; object-fit: contain;">
            </div>
        </div>
        <!-- Tambahkan content sebelah kanan anda di sini -->
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
