<?php

session_start();


if (isset($_POST['add_to_bag'])) {
    $_SESSION['selected_config'] = $_POST['paletteConfig'];
    header("Location: cart.php");
    exit();
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
</head>
<body class="d-flex flex-column min-vh-100 bg-rhode text-rhode-dark">

    <nav class="navbar navbar-expand-lg rhode-nav py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand rhode-brand m-0" href="home.html">Pixie</a>
            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav ms-auto rhode-nav-links gap-3">
                    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php">Customizer</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Bag</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.html">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form action="index.php" method="POST" class="container my-5 flex-grow-1">
        <div class="row g-5 w-100 justify-content-center align-items-center m-0">
            
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div id="imagePaletteFrame" class="image-palette-frame configuration-9" style="background-image: url('photos/nineslots.png');">
                    <div id="interactiveGrid" class="grid-overlay-9"></div>
                </div>
                <p class="rhode-target-text mt-4">Active Target: <span id="targetBadge">Slot 1</span></p>
            </div>

            <div class="col-md-5">
                <div class="rhode-card p-4 p-md-5">
                    <h5 class="rhode-label">01. Select Configuration</h5>
                    <div class="d-flex gap-3 mb-5">
                        <div class="rhode-radio-wrapper">
                            <input type="radio" name="paletteConfig" id="config9" value="9" checked>
                            <label for="config9">4 Slots Palette</label>
                        </div>
                        <div class="rhode-radio-wrapper">
                            <input type="radio" name="paletteConfig" id="config4" value="4">
                            <label for="config4">9 Slots Palette</label>
                        </div>
                    </div>

                    <h5 class="rhode-label">02. Choose Your Shade</h5>
                    <p class="rhode-instruction mb-4">Click on a circular slot inside the product photo, then pick a color shade below:</p>
                    <div class="rhode-shades-grid">
                        <div class="color-dot" style="background-color: #FFC6FF;" title="Baby Pink" onclick="applyColor('#FFC6FF')"></div>
                        <div class="color-dot" style="background-color: #FFB3C6;" title="Blush Pink" onclick="applyColor('#FFB3C6')"></div>
                        <div class="color-dot" style="background-color: #E0A96D;" title="Rose Gold" onclick="applyColor('#E0A96D')"></div>
                        <div class="color-dot" style="background-color: #D4A5A5;" title="Dusty Rose" onclick="applyColor('#D4A5A5')"></div>
                        <div class="color-dot" style="background-color: #A37081;" title="Mauve Pink" onclick="applyColor('#A37081')"></div>
                        <div class="color-dot" style="background-color: #8C3A5C;" title="Berry Sparkle" onclick="applyColor('#8C3A5C')"></div>
                        <div class="color-dot" style="background-color: #C68B59;" title="Soft Caramel" onclick="applyColor('#C68B59')"></div>
                        <div class="color-dot" style="background-color: #B85C38;" title="Copper Bronze" onclick="applyColor('#B85C38')"></div>
                        <div class="color-dot" style="background-color: #4A2E2B;" title="Choco Fudge" onclick="applyColor('#4A2E2B')"></div>
                        <div class="color-dot" style="background-color: #5C524E;" title="Muted Espresso" onclick="applyColor('#5C524E')"></div>
                        <div class="color-dot" style="background-color: #FCE22A;" title="Pastel Lemon" onclick="applyColor('#FCE22A')"></div>
                        <div class="color-dot" style="background-color: #F3E99F;" title="Chiffon Gold" onclick="applyColor('#F3E99F')"></div>
                        <div class="color-dot" style="background-color: #E9D8A6;" title="Honey Gold" onclick="applyColor('#E9D8A6')"></div>
                        <div class="color-dot" style="background-color: #FDF6E2;" title="Champagne Gold" onclick="applyColor('#FDF6E2')"></div>
                        <div class="color-dot" style="background-color: #E2D4F0;" title="Pixie Dust" onclick="applyColor('#E2D4F0')"></div>
                        <div class="color-dot" style="background-color: #A060A0;" title="Sugar Plum" onclick="applyColor('#A060A0')"></div>
                        <div class="color-dot" style="background-color: #7851A9;" title="Berry Galaxy" onclick="applyColor('#7851A9')"></div>
                        <div class="color-dot" style="background-color: #D6A2E8;" title="Lilac Sorbet" onclick="applyColor('#D6A2E8')"></div>
                        <div class="color-dot" style="background-color: #C39BD3;" title="Starry Night" onclick="applyColor('#C39BD3')"></div>
                        <div class="color-dot" style="background-color: #8E44AD;" title="Magic Amethyst" onclick="applyColor('#8E44AD')"></div>
                    </div>

                    <button type="submit" name="add_to_bag" class="btn btn-rhode-buy w-100 mt-5">add to bag</button>
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
        let currentActiveSlot = 1;
        const imagePaletteFrame = document.getElementById('imagePaletteFrame');
        const interactiveGrid = document.getElementById('interactiveGrid');
        const targetBadge = document.getElementById('targetBadge');

        function buildInteractiveOverlay(slots) {
            interactiveGrid.innerHTML = "";
            currentActiveSlot = 1;
            targetBadge.innerText = "Slot 1";

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
                if (i === 1) hotspot.classList.add('active-hotspot');
                hotspot.setAttribute('data-slot', i);

                hotspot.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    document.querySelectorAll('.hotspot-slot').forEach(h => h.classList.remove('active-hotspot'));
                    this.classList.add('active-hotspot');
                    currentActiveSlot = this.getAttribute('data-slot');
                    targetBadge.innerText = `Slot ${currentActiveSlot}`;
                });

                interactiveGrid.appendChild(hotspot);
            }
        }

        function applyColor(hexColor) {
            let activeHotspot = document.querySelector(`.hotspot-slot[data-slot="${currentActiveSlot}"]`);
            if (activeHotspot) {
                activeHotspot.style.backgroundColor = hexColor;
                activeHotspot.style.opacity = "0.85";
                activeHotspot.style.borderStyle = "solid";
            }
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