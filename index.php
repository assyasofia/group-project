<?php
ob_start(); // Mengatasi isu sekatan header redirect dalam PHP
session_start();

// SECURITY CHECK: If the user is NOT logged in, kick them back to login.php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// SAMBUNGAN DATABASE (Sila pastikan nama db sepadan dengan phpMyAdmin awak)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pixie_db"; // <-- Sila tukar nama database di sini jika berbeza

$conn = new mysqli($servername, $username, $password, $dbname);

// Semak sambungan DB
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// LOGIK PENGURUSAN BORANG (Bila user tekan butang "Add to Bag" ATAU "Buy Now")
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['add_to_bag']) || isset($_POST['buy_now']))) {
    
    $user = $_SESSION['user']; 
    $config = isset($_POST['paletteConfig']) ? $_POST['paletteConfig'] : '9'; 
    $shades = isset($_POST['shades_hidden']) ? $_POST['shades_hidden'] : '[]';

    // Masukkan data konfigurasi & warna ke dalam database
    $stmt = $conn->prepare("INSERT INTO cart (user_id, config_type, shades_data) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $user, $config, $shades);
    $stmt->execute();
    $stmt->close();

    // TIKTOK LOGIC: Tentukan arah halaman mengikut butang pilihan user
    if (isset($_POST['buy_now'])) {
        // Jika tekan Buy Now, paksa redirect menggunakan JavaScript supaya 100% berjaya bertukar halaman
        echo "<script>window.location.href='cart.php';</script>";
        exit();
    } else {
        // Jika tekan Add to Bag, kekal di halaman semasa dan tunjuk alert
        echo "<script>alert('Successfully added to your bag!'); window.location.href='index.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear Pink Palette Customizer | Pixie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;1,9..144,300&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .active-hotspot {
            border: 2px solid #a37081 !important;
            box-shadow: 0 0 10px rgba(163, 112, 129, 0.6);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

<?php include("header.php"); ?>

    <form action="index.php" method="POST" id="customizerForm" class="container my-5 flex-grow-1">
        <input type="hidden" name="shades_hidden" id="shadesHiddenInput" value="[]">

        <div class="row g-5 w-100 justify-content-center align-items-center m-0">
            
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div id="imagePaletteFrame" class="image-palette-frame configuration-9" style="background-image: url('photos/nineslots.png');">
                    <div id="interactiveGrid" class="grid-overlay-9"></div>
                </div>
                
                <div id="deleteActionArea" class="mt-4 text-center" style="display: none; min-height: 40px;">
                    <button type="button" id="btnDeleteColor" class="btn btn-outline-danger btn-sm px-4 rounded-pill">
                        Remove Color from Slot <span id="deleteSlotNumber">1</span>
                    </button>
                </div>
            </div>

            <div class="col-md-5">
                <div class="rhode-card p-4 p-md-5">
                    <h5 class="rhode-label">01. Select Configuration</h5>
                    <div class="d-flex gap-3 mb-5">
                        <div class="rhode-radio-wrapper">
                            <input type="radio" name="paletteConfig" id="config9" value="9" checked>
                            <label for="config9">9 Slots Palette</label>
                        </div>
                        <div class="rhode-radio-wrapper">
                            <input type="radio" name="paletteConfig" id="config4" value="4">
                            <label for="config4">4 Slots Palette</label>
                        </div>
                    </div>

   <h5 class="rhode-label">02. Choose Your Shade</h5>
<p class="rhode-instruction mb-4">Click to build your dream palette!</p>

<div class="rhode-shades-grid">
    <!-- COOL TONES (Pinkish, Berry, Lilac) -->
    <div class="color-dot" style="background-color: #FFC6FF;" title="Baby Pink" onclick="applyColor('#FFC6FF')"></div>
    <div class="color-dot" style="background-color: #FFB3C6;" title="Blush" onclick="applyColor('#FFB3C6')"></div>
    <div class="color-dot" style="background-color: #D6A2E8;" title="Lilac" onclick="applyColor('#D6A2E8')"></div>
    <div class="color-dot" style="background-color: #A060A0;" title="Sugar Plum" onclick="applyColor('#A060A0')"></div>
    <div class="color-dot" style="background-color: #7851A9;" title="Deep Berry" onclick="applyColor('#7851A9')"></div>
    <div class="color-dot" style="background-color: #8E44AD;" title="Magic Purple" onclick="applyColor('#8E44AD')"></div>
    <div class="color-dot" style="background-color: #D4A5A5;" title="Dusty Rose" onclick="applyColor('#D4A5A5')"></div>
    <div class="color-dot" style="background-color: #A37081;" title="Mauve" onclick="applyColor('#A37081')"></div>

    <!-- NEUTRAL TONES (Champagne, Gold, Soft) -->
    <div class="color-dot" style="background-color: #FDF6E2;" title="Champagne" onclick="applyColor('#FDF6E2')"></div>
    <div class="color-dot" style="background-color: #F3E99F;" title="Chiffon" onclick="applyColor('#F3E99F')"></div>
    <div class="color-dot" style="background-color: #E9D8A6;" title="Honey" onclick="applyColor('#E9D8A6')"></div>
    <div class="color-dot" style="background-color: #FCE22A;" title="Lemon" onclick="applyColor('#FCE22A')"></div>

    <!-- WARM TONES (Caramel, Bronze, Brown) -->
    <div class="color-dot" style="background-color: #E0A96D;" title="Rose Gold" onclick="applyColor('#E0A96D')"></div>
    <div class="color-dot" style="background-color: #C68B59;" title="Caramel" onclick="applyColor('#C68B59')"></div>
    <div class="color-dot" style="background-color: #BC8A5F;" title="Warm Taupe" onclick="applyColor('#BC8A5F')"></div>
    <div class="color-dot" style="background-color: #B85C38;" title="Copper" onclick="applyColor('#B85C38')"></div>
    <div class="color-dot" style="background-color: #8B5E3C;" title="Earth Brown" onclick="applyColor('#8B5E3C')"></div>
    <div class="color-dot" style="background-color: #4A2E2B;" title="Espresso" onclick="applyColor('#4A2E2B')"></div>
    <div class="color-dot" style="background-color: #5C524E;" title="Muted Espresso" onclick="applyColor('#5C524E')"></div>
    <div class="color-dot" style="background-color: #3E2723;" title="Dark Cocoa" onclick="applyColor('#3E2723')"></div>
</div>
                    <div class="row g-2 mt-5">
                        <div class="col-6">
                            <button type="submit" name="add_to_bag" class="btn btn-outline-dark w-100 text-uppercase py-2" style="font-size: 0.8rem; letter-spacing: 0.05em;">Add to Bag</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="buy_now" class="btn btn-outline-dark w-100 text-uppercase py-2" style="font-size: 0.8rem; letter-spacing: 0.05em;">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer class="rhode-footer py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 pixie cosmetics. all rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentActiveSlot = null; 
        let slotToModify = null; 
        let activeConfiguration = 9; 
        
        const imagePaletteFrame = document.getElementById('imagePaletteFrame');
        const interactiveGrid = document.getElementById('interactiveGrid');
        const deleteActionArea = document.getElementById('deleteActionArea');
        const btnDeleteColor = document.getElementById('btnDeleteColor');
        const deleteSlotNumber = document.getElementById('deleteSlotNumber');
        const shadesHiddenInput = document.getElementById('shadesHiddenInput');

        function buildInteractiveOverlay(slots) {
            interactiveGrid.innerHTML = "";
            currentActiveSlot = null;
            slotToModify = null;
            activeConfiguration = slots;
            deleteActionArea.style.display = "none"; 
            updateHiddenInput(); 

            if (slots === 4) {
                imagePaletteFrame.style.backgroundImage = "url('photos/fourslots.PNG')";
                imagePaletteFrame.className = "image-palette-frame configuration-4";
                interactiveGrid.className = "grid-overlay-4";
            } else {
                imagePaletteFrame.style.backgroundImage = "url('photos/nineslots.png')";
                imagePaletteFrame.className = "image-palette-frame configuration-9";
                interactiveGrid.className = "grid-overlay-9";
            }

            for (let i = 1; i <= slots; i++) {
                const hotspot = document.createElement('div');
                hotspot.className = "hotspot-slot";
                hotspot.setAttribute('data-slot', i);
                hotspot.setAttribute('data-has-color', 'false');

                hotspot.addEventListener('click', function(e) {
                    e.preventDefault(); 

                    document.querySelectorAll('.hotspot-slot').forEach(h => h.classList.remove('active-hotspot'));
                    this.classList.add('active-hotspot');
                    currentActiveSlot = this.getAttribute('data-slot');

                    if (this.getAttribute('data-has-color') === 'true') {
                        slotToModify = this;
                        deleteSlotNumber.innerText = currentActiveSlot;
                        deleteActionArea.style.display = "block"; 
                    } else {
                        slotToModify = null;
                        deleteActionArea.style.display = "none";
                    }
                });

                interactiveGrid.appendChild(hotspot);
            }
        }

        function applyColor(hexColor) {
            let targetHotspot = null;

            if (currentActiveSlot !== null) {
                let checkSlot = document.querySelector(`.hotspot-slot[data-slot="${currentActiveSlot}"]`);
                if (checkSlot) {
                    targetHotspot = checkSlot;
                }
            }

            if (!targetHotspot) {
                targetHotspot = Array.from(document.querySelectorAll('.hotspot-slot')).find(h => h.getAttribute('data-has-color') === 'false');
            }

            if (targetHotspot) {
                targetHotspot.style.backgroundColor = hexColor;
                targetHotspot.style.opacity = "0.85";
                targetHotspot.style.borderStyle = "solid";
                targetHotspot.setAttribute('data-has-color', 'true');
                targetHotspot.setAttribute('data-hex', hexColor);

                targetHotspot.classList.remove('active-hotspot');
                currentActiveSlot = null;
                slotToModify = null;
                deleteActionArea.style.display = "none"; 
                updateHiddenInput(); 
            } else {
                alert('All slots are full!');
            }
        }

        btnDeleteColor.addEventListener('click', function() {
            if (slotToModify) {
                slotToModify.style.backgroundColor = 'transparent';
                slotToModify.style.opacity = "1";
                slotToModify.style.borderStyle = "dashed"; 
                slotToModify.setAttribute('data-has-color', 'false');
                slotToModify.removeAttribute('data-hex');
                slotToModify.classList.remove('active-hotspot');
                
                currentActiveSlot = null;
                slotToModify = null;
                deleteActionArea.style.display = "none";
                updateHiddenInput(); 
            }
        });

        function updateHiddenInput() {
            let colorsArray = [];
            for (let i = 1; i <= activeConfiguration; i++) {
                let slot = document.querySelector(`.hotspot-slot[data-slot="${i}"]`);
                if (slot && slot.getAttribute('data-has-color') === 'true') {
                    colorsArray.push(slot.getAttribute('data-hex'));
                } else {
                    colorsArray.push(""); 
                }
            }
            shadesHiddenInput.value = JSON.stringify(colorsArray);
        }

        document.querySelectorAll('input[name="paletteConfig"]').forEach(radio => {
            radio.addEventListener('change', function() {
                buildInteractiveOverlay(parseInt(this.value));
            });
        });

        buildInteractiveOverlay(9);
    </script>
</body>
</html>
