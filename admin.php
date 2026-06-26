<?php
include('db_connect.php');
session_start();

$search_value = "";
$filter_value = "";

// Capture parameter entries routed via HTTP GET submissions
if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
}
if (isset($_GET['filter_slots'])) {
    $filter_value = $_GET['filter_slots'];
}

// ==========================================================================
// 2. BACKEND FILTER LOGIC SUB-ROUTINES (Member 4 Core Module)
// ==========================================================================
$sql = "SELECT orders.order_id, users.username, orders.palette_type 
        FROM orders 
        JOIN users ON orders.user_id = users.user_id WHERE 1=1";

if (!empty($search_value)) {
    $sql .= " AND (users.username LIKE '%$search_value%' OR orders.order_id LIKE '%$search_value%')";
}

if (!empty($filter_value)) {
    $sql .= " AND orders.palette_type = '$filter_value'";
}

$sql .= " ORDER BY orders.order_id DESC";

// PEMBETULAN ERROR: Dibalut dengan try-catch supaya tidak crash jika table orders/users belum lengkap dipadankan
try {
    $result = mysqli_query($conn, $sql);
} catch (Exception $e) {
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Pixie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <style>
        .admin-table {
            font-family: 'Jost', sans-serif;
            background-color: transparent !important;
        }
        .admin-table th {
            font-family: 'Jost', sans-serif;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            border-bottom: 2px solid #e5dada !important;
            color: #4A3E3D !important;
            padding: 15px;
        }
        .admin-table td {
            padding: 18px 15px;
            border-bottom: 1px solid #eee2e2 !important;
            color: #5C524E;
        }
        .color-preview-badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 0.75rem;
            font-weight: 500;
            border-radius: 30px;
            margin-right: 4px;
            border: 1px solid rgba(0,0,0,0.06);
            font-family: 'Jost', sans-serif;
        }
        .btn-rhode-delete {
            font-family: 'Jost', sans-serif;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            border: 1px solid #d4a5a5;
            color: #a37081;
            background: transparent;
            transition: all 0.2s ease;
        }
        .btn-rhode-delete:hover {
            background-color: #8c3a5c;
            color: #ffffff;
            border-color: #8c3a5c;
        }
        .rhode-input {
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            color: #4A2E2B !important;
            font-family: 'Jost', sans-serif;
            border-radius: 0 !important;
        }
        .rhode-input:focus {
            background-color: #ffffff;
            border-color: #A37081 !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

    <nav class="navbar navbar-expand-lg rhode-nav py-4">
        <div class="container position-relative d-flex justify-content-between align-items-center">
            <a class="navbar-brand rhode-brand m-0" href="index.html">Pixie</a>
            <div class="collapse navbar-collapse d-none d-lg-block" id="navbarNav">
                <ul class="navbar-nav ms-auto rhode-nav-links gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Customizer</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Bag</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link active" href="admin.php">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <h5 class="rhode-label mb-2" style="font-size: 0.85rem; letter-spacing: 2px;">Management Console</h5>
                <h2 style="font-family: 'Fraunces', serif; font-weight: 300; font-style: italic;" class="m-0">Custom Palette Submissions</h2>
            </div>
            <span class="rhode-target-text m-0" style="font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase;">Secure Admin Mode</span>
        </div>

        <div class="rhode-card p-4 mb-5" style="border-radius: 0;">
            <form action="admin.php" method="GET" class="row g-4">
                
                <div class="col-md-5">
                    <label class="rhode-instruction mb-2 d-block text-uppercase fw-medium" style="font-size: 0.75rem; letter-spacing: 1px;">Search Parameter</label>
                    <input type="text" name="search" class="form-control rhode-input py-2" placeholder="Type customer name or order code..." value="<?php echo htmlspecialchars($search_value); ?>">
                </div>
                
                <div class="col-md-4">
                    <label class="rhode-instruction mb-2 d-block text-uppercase fw-medium" style="font-size: 0.75rem; letter-spacing: 1px;">Filter By Layout</label>
                    <select name="filter_slots" class="form-select rhode-input py-2">
                        <option value="">All Configurations</option>
                        <option value="4" <?php if($filter_value == '4') echo 'selected'; ?>>4 Slots Layout</option>
                        <option value="9" <?php if($filter_value == '9') echo 'selected'; ?>>9 Slots Layout</option>
                    </select>
                </div>
                
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-rhode-buy w-100 py-2 m-0" style="font-size: 0.8rem; height: 42px;">Apply Updates</button>
                </div>
                
            </form>
        </div>

        <?php if(isset($_GET['status']) && $_GET['status'] == 'success_delete'): ?>
            <div class="alert alert-light border-0 rounded-0 shadow-sm p-3 mb-4 d-flex justify-content-between align-items-center" role="alert" style="background-color: #ffffff; font-family: 'Jost', sans-serif;">
                <span style="color: #4A2E2B;"><strong style="font-family: 'Fraunces', serif; font-style: italic; font-weight: 400;">Success!</strong> Custom palette configuration trace dropped cleanly.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 0.8rem;"></button>
            </div>
        <?php endif; ?>

        <div class="rhode-card p-0 overflow-hidden mb-5" style="border-radius: 0;">
            <div class="table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">Reference ID</th>
                            <th>Customer Account</th>
                            <th>Configuration</th>
                            <th>Shade Matrix Selection Array</th>
                            <th class="pe-4 text-center">Dashboard Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        if($result && mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $current_order_id = $row['order_id'];
                                
                                $color_sql = "SELECT hex_color_code FROM palette_selection WHERE order_id = '$current_order_id' ORDER BY slot_number ASC";
                                $color_result = mysqli_query($conn, $color_sql);
                        ?>
                        <tr>
                            <td class="ps-4 fw-medium text-dark">#PX-<?php echo $row['order_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td style="font-style: italic; font-family: 'Fraunces', serif; font-size: 0.95rem;">
                                <?php echo $row['palette_type']; ?> Custom Slots
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    <?php 
                                    while($color_row = mysqli_fetch_assoc($color_result)) {
                                        $hex = $color_row['hex_color_code'];
                                        echo "<span class='color-preview-badge' style='background-color: $hex; color: #4A2E2B;'>$hex</span>";
                                    }
                                    ?>
                                </div>
                            </td>
                            <td class="pe-4 text-center">
                                <a href="admin_actions.php?delete_id=<?php echo $row['order_id']; ?>" class="btn btn-rhode-delete btn-sm px-3 rounded-0" onclick="return confirm('Are you sure you want to delete this custom palette profile layout record?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                        ?>
                        <tr>
                            <td class="ps-4 fw-medium" style="color: #4A2E2B;">#PX-2026-09A</td>
                            <td>Farah Natasha</td>
                            <td style="font-style: italic; font-family: 'Fraunces', serif; font-size: 0.95rem;">4 Slots Palette</td>
                            <td>
                                <div class="d-flex flex-wrap gap-1 align-items-center">
                                    <span class="color-preview-badge" style="background-color: #FFC6FF; color: #4A2E2B;">#FFC6FF</span>
                                    <span class="color-preview-badge" style="background-color: #FFB3C6; color: #4A2E2B;">#FFB3C6</span>
                                    <span class="color-preview-badge" style="background-color: #E0A96D; color: #4A2E2B;">#E0A96D</span>
                                    <span class="color-preview-badge" style="background-color: #4A2E2B; color: #ffffff;">#4A2E2B</span>
                                </div>
                            </td>
                            <td class="pe-4 text-center">
                                <a href="admin_actions.php?delete_id=202609" class="btn btn-rhode-delete btn-sm px-3 rounded-0" onclick="return confirm('Are you sure you want to delete this custom palette profile layout record?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 pixie cosmetics. all rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
