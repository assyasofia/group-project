<?php
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// ==================================================================
// BACK-END PROTECTION: BLOCK CUSTOMERS FROM ACCESSING STAFF FILES
// ==================================================================
// If the user is not logged in OR their session role is not 'admin', block access[cite: 2]
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit();
}
// ==================================================================

include("db_connect.php"); // Connects to the database pixie_db[cite: 1]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Reports | Pixie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Jost', sans-serif;
            background-color: #F7F4EF;
        }
        .report-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border: none;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 text-rhode-dark">

    <!-- Includes the official Pixie header containing dynamic navigation links for staff[cite: 2, 3] -->
    <?php include("header.php"); ?>

    <main class="container my-5 flex-grow-1">
        <div class="report-card p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h2 class="mb-1" style="font-family: serif; font-style: italic;">Sales & Customizer Reports</h2>
                    <p class="text-muted small mb-0">Statistical overview of custom cosmetic palettes ordered by customers.</p>
                </div>
                <button class="btn btn-dark btn-sm px-4 rounded-pill" onclick="window.print()">
                    <i class="fas fa-print me-1"></i> Print Report
                </button>
            </div>

            <hr class="mb-5 border-light-subtle">

            <!-- Summary Widgets Section -->
            <div class="row g-4 mb-5 text-center">
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-light rounded-3">
                        <div class="small text-muted text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px;">Total Revenue</div>
                        <h3 class="fw-bold mb-0" style="color: #A37081;">RM 4,250.00</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-light rounded-3">
                        <div class="small text-muted text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px;">Palettes Sold</div>
                        <h3 class="fw-bold mb-0">85 Units</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-light rounded-3">
                        <div class="small text-muted text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px;">Top Configuration</div>
                        <h3 class="fw-bold mb-0">9 Slots</h3>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 bg-light rounded-3">
                        <div class="small text-muted text-uppercase fw-semibold mb-1" style="letter-spacing: 0.5px;">New Customers</div>
                        <h3 class="fw-bold mb-0">14 Users</h3>
                    </div>
                </div>
            </div>

            <!-- Customizer/Cart Log Table -->
            <h5 class="mb-3 text-uppercase small fw-bold tracking-wide text-secondary">Recent Customizer Configuration Log</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle border-light-subtle">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">Cart ID</th>
                            <th class="py-3">Customer Name</th>
                            <th class="py-3">Selected Type</th>
                            <th class="py-3">Hex Color Data (Shades)</th>
                            <th class="py-3 text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Pulling the list of cart data for staff review[cite: 2]
                        $query = "SELECT cart.id, cart.user_id, cart.config_type, cart.shades_data FROM cart ORDER BY cart.id DESC LIMIT 5";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='fw-semibold'>#" . $row['id'] . "</td>";
                                echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                                echo "<td><span class='badge bg-secondary px-2 py-1'>" . $row['config_type'] . " Slots</span></td>";
                                echo "<td class='text-muted small'><code>" . htmlspecialchars($row['shades_data']) . "</code></td>";
                                echo "<td class='text-end'><span class='text-warning small'><i class='fas fa-clock me-1'></i> In Bag</span></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center py-4 text-muted small'>No customizer configuration records found in the database.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center text-muted small">
            <p class="mb-0">&copy; 2026 pixie cosmetics. Staff Confidential Internal Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
