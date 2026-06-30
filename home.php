<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pixie Cosmetics</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@300;400;500&family=Jost:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="style.css">

</head>

<body>


<div class="top-banner text-center">

    🚚 Free Shipping on orders above RM100
    &nbsp;&nbsp;•&nbsp;&nbsp;
    ✨ 20% OFF your first custom palette
    &nbsp;&nbsp;•&nbsp;&nbsp;
    Use Code
    <strong>PIXIE20</strong>

</div>

<?php include("header.php"); ?>

<!-- HERO -->

<section class="hero-section">

    <div class="container">

        <div class="row align-items-center gy-5">

            <!-- LEFT -->

            <div class="col-lg-6">

                <span class="hero-subtitle">

                    Build Something Beautiful

                </span>

                <h1 class="hero-title">

                    Your Beauty.<br>

                    <span>Your Palette.</span>

                </h1>

                <p class="hero-description">

                    Create a custom eyeshadow palette made just for you.
                    Pick your favourite shades, personalise every detail,
                    and enjoy a luxurious makeup experience crafted around
                    your own style.

                </p>

                <div class="hero-rating">

                    <div>

                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>

                    </div>

                    <span>

                        Rated 4.9 / 5
                        by over 2,000 customers

                    </span>

                </div>

                <a href="index.php"
                   class="btn btn-hero">

                    Create Your Palette

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-6">

                <div class="hero-image-wrapper">


                    <img src="photos/front.png"
                         class="hero-product img-fluid"
                         alt="Pixie Palette">

                    <i class="bi bi-stars sparkle one"></i>
                    <i class="bi bi-stars sparkle two"></i>
                    <i class="bi bi-stars sparkle three"></i>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="py-5">

    <div class="container">

        <div class="row text-center mb-5">

            <div class="col-lg-8 mx-auto">

                <h2 class="display-6 mb-4">

                    Designed Around You

                </h2>

                <p class="text-muted">

                    At Pixie Cosmetics, every palette is created with your
                    personality in mind. Mix colours you truly love and build
                    something uniquely yours.

                </p>

            </div>

        </div>

        <div class="row g-4 mb-5">

            <div class="col-md-4">

                <div class="rhode-card p-4 h-100 text-center">

                    <div class="display-5 mb-3">
                        🌸
                    </div>

                    <h5 class="mb-3">
                        Custom Colours
                    </h5>

                    <p class="text-muted mb-0">

                        Select your favourite shades and build
                        a palette that truly reflects your own style.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="rhode-card p-4 h-100 text-center">

                    <div class="display-5 mb-3">
                        ✨
                    </div>

                    <h5 class="mb-3">
                        Premium Formula
                    </h5>

                    <p class="text-muted mb-0">

                        Soft, highly pigmented eyeshadows
                        designed for effortless blending.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="rhode-card p-4 h-100 text-center">

                    <div class="display-5 mb-3">
                        💖
                    </div>

                    <h5 class="mb-3">
                        Made For You
                    </h5>

                    <p class="text-muted mb-0">

                        Every palette is carefully assembled
                        according to your unique selection.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="py-5 bg-white">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-6 col-lg-3">

               
                <i class="bi bi-truck fs-3 mb-3 d-block text-secondary"></i>

                <h6 class="fw-semibold">

                    FREE SHIPPING

                </h6>

                <small class="text-muted">

                    Orders over RM100

                </small>

            </div>

            <div class="col-6 col-lg-3">

                <i class="bi bi-arrow-repeat display-5 mb-3"></i>

                <h6 class="fw-semibold">

                    EASY RETURNS

                </h6>

                <small class="text-muted">

                    30 Days Guarantee

                </small>

            </div>

            <div class="col-6 col-lg-3">

                <i class="bi bi-shield-check display-5 mb-3"></i>

                <h6 class="fw-semibold">

                    SECURE PAYMENT

                </h6>

                <small class="text-muted">

                    Safe Checkout

                </small>

            </div>

            <div class="col-6 col-lg-3">

                <i class="bi bi-headset display-5 mb-3"></i>

                <h6 class="fw-semibold">

                    SUPPORT

                </h6>

                <small class="text-muted">

                    Friendly Customer Care

                </small>

            </div>

        </div>

    </div>

</section>



<section class="py-5">

    <div class="container">

        <div class="rhode-card p-5 text-center">

            <h2 class="display-5 mb-4">

                Ready To Build Your Palette?

            </h2>

            <p class="text-muted mb-4">

                Create a palette that's uniquely yours and
                enjoy 20% OFF on your very first custom order.

            </p>

            <a href="index.php"
               class="btn btn-hero">

                Start Creating

            </a>

        </div>

    </div>

</section>


<!-- TESTIMONIALS -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2>

                Loved By Our Customers

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="rhode-card p-4">

                    <div class="mb-3 text-warning">

                        ★★★★★

                    </div>

                    <p>

                        "The colours are beautiful and the quality
                        exceeded my expectations."

                    </p>

                    <strong>

                        Mya Sofea

                    </strong>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="rhode-card p-4">

                    <div class="mb-3 text-warning">

                        ★★★★★

                    </div>

                    <p>

                        "Love being able to customise my own palette.
                        Shipping was fast too."

                    </p>

                    <strong>

                        Aleeya

                    </strong>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="rhode-card p-4">

                    <div class="mb-3 text-warning">

                        ★★★★★

                    </div>

                    <p>

                        "My favourite makeup purchase this year.
                        Beautiful packaging."

                    </p>

                    <strong>

                        Assya Sofia

                    </strong>

                </div>

            </div>

        </div>

    </div>

</section>


<footer class="py-5 bg-white border-top">

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4">

                <h3 class="rhode-brand mb-3">

                    pixie

                </h3>

                <p class="text-muted">

                    Create your own custom eyeshadow palette with premium
                    colours made to express your unique beauty.

                </p>

            </div>

            <div class="col-lg-2">

                <h6 class="fw-bold mb-3">

                    SHOP

                </h6>

                <ul class="list-unstyled">

                    <li class="mb-2">

                        <a href="index.php"
                           class="text-decoration-none text-muted">

                            Build Palette

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="#"
                           class="text-decoration-none text-muted">

                            Best Sellers

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="text-decoration-none text-muted">

                            New Arrival

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-lg-2">

                <h6 class="fw-bold mb-3">

                    COMPANY

                </h6>

                <ul class="list-unstyled">

                    <li class="mb-2">

                        <a href="#"
                           class="text-decoration-none text-muted">

                            About

                        </a>

                    </li>

                    <li class="mb-2">

                        <a href="#"
                           class="text-decoration-none text-muted">

                            Contact

                        </a>

                    </li>

                    <li>

                        <a href="#"
                           class="text-decoration-none text-muted">

                            FAQ

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-lg-4">

                <h6 class="fw-bold mb-3">

                    FOLLOW US

                </h6>

                <div class="d-flex gap-3 fs-4">

                    <a href="#" class="text-dark">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="#" class="text-dark">

                        <i class="bi bi-facebook"></i>

                    </a>

                    <a href="#" class="text-dark">

                        <i class="bi bi-tiktok"></i>

                    </a>

                    <a href="#" class="text-dark">

                        <i class="bi bi-pinterest"></i>

                    </a>

                </div>

            </div>

        </div>

        <hr class="my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">

            <small class="text-muted">

                © <?php echo date("Y"); ?> Pixie Cosmetics. All Rights Reserved.

            </small>

            <small class="text-muted mt-3 mt-md-0">

                Made with ♥ for beauty lovers.

            </small>

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
