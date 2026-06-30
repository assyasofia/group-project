<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include("db_connect.php");

if (isset($_SESSION['user'])) { $user = $_SESSION['user']; } 
elseif (isset($_SESSION['username'])) { $user = $_SESSION['username']; } 
else { header("Location: login.php"); exit(); }

// Checkout Process Logic
// ==================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_items'])) {
    $selected_items = $_POST['selected_items'];

    if (is_array($selected_items) && count($selected_items) > 0) {
        $success_count = 0;

        foreach ($selected_items as $cart_id) {
            $cart_id = mysqli_real_escape_string($conn, $cart_id);

            $cart_query = "SELECT * FROM cart WHERE id = '$cart_id' AND user_id = '$user'";
            $cart_result = mysqli_query($conn, $cart_query);

            if ($cart_result && mysqli_num_rows($cart_result) > 0) {
                $cart_row = mysqli_fetch_assoc($cart_result);
                $config = $cart_row['config_type'];
                $shades = $cart_row['shades_data'];
                $shades_array = json_decode($shades, true);

                $stmt_order = $conn->prepare("INSERT INTO orders (user_id, palette_type) VALUES (?, ?)");
                $stmt_order->bind_param("ss", $user, $config);
                $stmt_order->execute();
                $new_order_id = $conn->insert_id; // Ambil ID order yang dijana
                $stmt_order->close();

                if (is_array($shades_array)) {
                    $stmt_selection = $conn->prepare("INSERT INTO palette_selection (order_id, slot_number, hex_color_code) VALUES (?, ?, ?)");
                    foreach ($shades_array as $index => $hex_code) {
                        $slot_number = $index + 1;
                        if (!empty($hex_code)) {
                            $stmt_selection->bind_param("iis", $new_order_id, $slot_number, $hex_code);
                            $stmt_selection->execute();
                        }
                    }
                    $stmt_selection->close();
                }

                mysqli_query($conn, "DELETE FROM cart WHERE id = '$cart_id'");
                $success_count++;
            }
        }

        if ($success_count > 0) {
            echo "<script>localStorage.removeItem('cartCheckedItems'); window.location.href='thankyou.php';</script>";
            exit();
        }
    }
}
// ==================================================================

$is_first_time = true; 
$res = $conn->query("SELECT COUNT(*) as total FROM orders WHERE user_id = '$user'");
if ($res && $res->fetch_assoc()['total'] > 0) { $is_first_time = false; }

$query = "SELECT * FROM cart WHERE user_id = ? ORDER BY id DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user);
$stmt->execute();
$cart_items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

function calculatePrice($config_type) { return ($config_type == 4) ? 80.00 : 180.00; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Bag | Pixie</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .mini-palette-preview { width: 120px; aspect-ratio: 1 / 1; background-size: contain; background-repeat: no-repeat; background-position: center; position: relative; flex-shrink: 0; }
        .mini-dot { position: absolute; width: 18%; height: 18%; border-radius: 50%; border: 1px solid rgba(0, 0, 0, 0.08); transform: translate(-50%, -50%); }
        .cart-checkbox { width: 20px; height: 20px; accent-color: #a37081; cursor: pointer; }
        .slot4-1 { top: 52%; left: 39%; } .slot4-2 { top: 52%; left: 61.34%; }
        .slot4-3 { top: 74%; left: 39%; } .slot4-4 { top: 74%; left: 61.34%; }
        .slot9-1 { top: 47.5%; left: 35.5%; } .slot9-2 { top: 47.5%; left: 50%; } .slot9-3 { top: 47.5%; left: 65%; }
        .slot9-4 { top: 62.5%; left: 35.5%; } .slot9-5 { top: 62.5%; left: 50%; } .slot9-6 { top: 62.5%; left: 65%; }
        .slot9-7 { top: 77%; left: 35.5%; } .slot9-8 { top: 77%; left: 50%; } .slot9-9 { top: 77%; left: 65%; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">
<?php include("header.php"); ?>

<div class="container my-5 flex-grow-1 d-flex flex-column justify-content-start">
    <form id="checkoutForm" action="cart.php" method="POST"></form>
    <div class="row g-4 justify-content-center m-0 w-100">
        <div class="col-lg-8 p-0">
            <h3 class="mb-4" style="font-family: 'Fraunces', serif;">Your Shopping Bag</h3>
            
            <?php if (empty($cart_items)): ?>
                <div class="text-center my-5 py-5">
                    <h4 style="font-family: 'Fraunces', serif;">Your Cart is Empty</h4>
                    <p>Looks like you haven't added anything yet.</p>
                    <a href="index.php" class="btn btn-dark mt-3">Go Customize Your Palette</a>
                </div>
            <?php else: ?>
                <?php foreach ($cart_items as $item): 
                    $price = calculatePrice($item['config_type']);
                    $qty = $item['quantity'] ?? 1;
                    $total_item_price = $price * $qty;
                    $shades = json_decode($item['shades_data'], true);
                    $bgImage = ($item['config_type'] == 4) ? 'photos/fourslots.PNG' : 'photos/nineslots.png';
                ?>
                <div class="rhode-card mb-3 p-3">
                    <div class="d-flex align-items-center gap-3">
                        <input type="checkbox" name="selected_items[]" form="checkoutForm" value="<?php echo $item['id']; ?>" class="cart-checkbox item-select-check" data-id="<?php echo $item['id']; ?>" data-price="<?php echo $total_item_price; ?>" onchange="updateTotalSummary(); saveCheckboxState()">
                        <div class="mini-palette-preview" style="background-image: url('<?php echo $bgImage; ?>');">
                            <?php if (is_array($shades)) foreach ($shades as $index => $color) {
                                $cls = ($item['config_type'] == 4 ? "slot4-" : "slot9-") . ($index + 1);
                                echo '<div class="mini-dot ' . $cls . '" style="background-color: ' . ($color ?: 'transparent') . ';"></div>';
                            } ?>
                        </div>
                        <div class="flex-grow-1 ms-2">
                            <h5>Custom <?php echo $item['config_type']; ?> Slots Palette</h5>
                            <form action="update_cart.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                Qty: <input type="number" name="quantity" value="<?php echo $qty; ?>" min="1" class="border-0 bg-transparent fw-bold" style="width:40px" onchange="this.form.submit()">
                            </form>
                            <p class="fw-bold m-0" style="color: #a37081;">RM <?php echo number_format($total_item_price, 2); ?></p>
                            <a href="delete_cart.php?id=<?php echo $item['id']; ?>" class="text-danger small">Remove</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($cart_items)): ?>
        <div class="col-lg-4 p-0 mt-4 ps-lg-4">
            <div class="rhode-card p-4">
                <h5>Order Summary</h5>
                <div class="d-flex justify-content-between mb-2"><span>Selected Items</span><span id="selectedCount">0</span></div>
                
                <div id="discountContainer" class="d-flex justify-content-between mb-2 text-danger" style="display: none;">
                    <span>20% OFF</span><span>-RM <span id="discountDisplay">0.00</span></span>
                </div>
                
                <div class="d-flex justify-content-between mb-2"><span>Shipping</span><span id="shippingDisplay" style="color: #2e7d32;">RM 0.00</span></div>
                <div class="d-flex justify-content-between pt-3 border-top">
                    <span>Total Price</span><span class="fw-bold" style="color: #a37081;">RM <span id="totalPriceDisplay">0.00</span></span>
                </div>
                <button type="submit" form="checkoutForm" id="btnCheckout" class="btn btn-dark w-100 mt-4" disabled>Proceed to Checkout</button>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function saveCheckboxState() {
        let checkedIds = [];
        document.querySelectorAll('.item-select-check:checked').forEach(box => checkedIds.push(box.getAttribute('data-id')));
        localStorage.setItem('cartCheckedItems', JSON.stringify(checkedIds));
    }

    function loadCheckboxState() {
        let checkedIds = JSON.parse(localStorage.getItem('cartCheckedItems') || '[]');
        checkedIds.forEach(id => {
            let box = document.querySelector(`.item-select-check[data-id="${id}"]`);
            if (box) box.checked = true;
        });
        updateTotalSummary();
    }

    function updateTotalSummary() {
        let subtotal = 0, count = 0;
        document.querySelectorAll('.item-select-check:checked').forEach(box => {
            subtotal += parseFloat(box.getAttribute('data-price'));
            count++;
        });
        
        // Diskaun 20% hanya jika subtotal > RM100 DAN user first time
        let isFirstTime = <?php echo $is_first_time ? 'true' : 'false'; ?>;
        let discount = (isFirstTime && subtotal >= 100) ? (0.20 * subtotal) : 0;
        let priceAfterDiscount = subtotal - discount;
        
        // Free shipping hanya jika subtotal >= RM100
        let shipping = (count > 0 && subtotal >= 100) ? 0 : 7.00;
        
        // Paparan Diskaun
        let discountContainer = document.getElementById('discountContainer');
        if (discount > 0) {
            discountContainer.style.display = 'flex';
            document.getElementById('discountDisplay').innerText = discount.toFixed(2);
        } else {
            discountContainer.style.display = 'none';
        }
        
        document.getElementById('shippingDisplay').innerText = (shipping === 0 && count > 0) ? "FREE" : (count > 0 ? "RM " + shipping.toFixed(2) : "RM 0.00");
        document.getElementById('shippingDisplay').style.color = "#2e7d32";
        
        document.getElementById('totalPriceDisplay').innerText = (priceAfterDiscount + (count > 0 ? shipping : 0)).toFixed(2);
        document.getElementById('selectedCount').innerText = count;
        document.getElementById('btnCheckout').disabled = (count === 0);
    }

    window.onload = loadCheckboxState;
</script>
</body>
</html>
