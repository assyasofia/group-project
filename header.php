<?php
// Pastikan session sudah bermula
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include("db_connect.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .cart-icon-wrapper { position: relative; }
    .cart-badge {
        position: absolute; top: -5px; right: -10px;
        background-color: #ff0000; color: white;
        font-size: 10px; font-weight: bold;
        padding: 2px 6px; border-radius: 50%;
    }
</style>

<nav class="navbar navbar-expand-lg rhode-nav py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand rhode-brand m-0" href="home.php">pixie</a>
        
        <div class="collapse navbar-collapse d-block">
            <ul class="navbar-nav ms-auto align-items-center rhode-nav-links">
                <li class="nav-item"><a class="nav-link" href="home.php">home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">customizer</a></li>
                
                <li class="nav-item cart-icon-wrapper mx-3">
                    <a class="nav-link" href="cart.php">
                        <i class="fas fa-shopping-bag" style="font-size: 1.2rem;"></i>
                        <?php
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user']; 
                            $stmt = $conn->prepare("SELECT COUNT(*) as total FROM cart WHERE user_id = ?");
                            $stmt->bind_param("s", $user);
                            $stmt->execute();
                            $data = $stmt->get_result()->fetch_assoc();
                            if ($data['total'] > 0) {
                                echo "<span class='cart-badge'>" . $data['total'] . "</span>";
                            }
                        }
                        ?>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle" style="font-size: 1.5rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php if (isset($_SESSION['user'])): ?>
                            <li><span class="dropdown-item-text">Hi, <?php echo htmlspecialchars($_SESSION['user']); ?></span></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="login.php">Sign In / Login</a></li>
                            <li><a class="dropdown-item" href="register.php">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>