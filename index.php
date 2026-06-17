<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear Pink Palette Customizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mystyle.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-slate shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">🏫 SchoolSystem</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-medium">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.html">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        <div class="row g-5 justify-content-center align-items-center">
            
            <div class="col-md-6 d-flex flex-column align-items-center">
                
                <div id="imagePaletteFrame" class="image-palette-frame configuration-9">
                    
                    <div id="interactiveGrid" class="grid-overlay-9">
                        </div>
                </div>
                
                <p class="text-muted mt-3 small">Active Target: <span id="targetBadge" class="badge bg-secondary">Slot 1</span></p>
            </div>

            <div class="col-md-5">
                <div class="card p-4 border-0 shadow-sm bg-white rounded-3">
                    
                    <h5 class="fw-bold text-slate mb-3">1. Select Configuration</h5>
                    <div class="d-flex gap-4 mb-4">
                        <div class="form-check">
                            <input class="form-check-input custom-radio" type="radio" name="paletteConfig" id="config9" value="9" checked>
                            <label class="form-check-label fw-medium" for="config9">9 Slots Palette</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input custom-radio" type="radio" name="paletteConfig" id="config4" value="4">
                            <label class="form-check-label fw-medium" for="config4">4 Slots Palette</label>
                        </div>
                    </div>

                    <hr class="my-4 text-secondary opacity-25">

                    <h5 class="fw-bold text-slate mb-3">2. Choose Your Shade</h5>
                    <p class="text-secondary small mb-3">Click on a circular slot inside the product photo, then pick a color shade below:</p>
                    
                    <div class="d-flex flex-wrap gap-3">
                        <div class="color-dot" style="background-color: #e8b4b8;" title="Blush Pink" onclick="applyColor('#e8b4b8')"></div>
                        <div class="color-dot" style="background-color: #c48c6a;" title="Maca Caramel" onclick="applyColor('#c48c6a')"></div>
                        <div class="color-dot" style="background-color: #5d3266;" title="Galaxy Purple" onclick="applyColor('#5d3266')"></div>
                        <div class="color-dot" style="background-color: #455a47;" title="Forest Green" onclick="applyColor('#455a47')"></div>
                        <div class="color-dot" style="background-color: #e5b869;" title="Golden Shimmer" onclick="applyColor('#e5b869')"></div>
                        <div class="color-dot" style="background-color: #d1b3c4;" title="Soft Lavender" onclick="applyColor('#d1b3c4')"></div>
                    </div>

                    <button class="btn btn-dark w-100 mt-5 fw-bold bg-slate border-0 py-2">Add Custom Palette to Order</button>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-dark text-secondary text-center py-3 mt-auto border-top border-secondary border-opacity-25">
        <div class="container">
            <p class="mb-0 small">&copy; 2026 School System Project. All Rights Reserved.</p>
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
                imagePaletteFrame.className = "image-palette-frame configuration-4";
                interactiveGrid.className = "grid-overlay-4";
            } else {
                imagePaletteFrame.className = "image-palette-frame configuration-9";
                interactiveGrid.className = "grid-overlay-9";
            }

            for (let i = 1; i <= slots; i++) {
                const hotspot = document.createElement('div');
                hotspot.className = "hotspot-slot";
                if (i === 1) hotspot.classList.add('active-hotspot');
                hotspot.setAttribute('data-slot', i);

                // When user clicks the slot area over the image
                hotspot.addEventListener('click', function() {
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
                // Instantly changes the background color inside the circle boundary overlay
                activeHotspot.style.backgroundColor = hexColor;
                // Gives the filled color a slight transparency layer so you still see the base pan texture beneath it
                activeHotspot.style.opacity = "0.85"; 
            }
        }

        document.querySelectorAll('input[name="paletteConfig"]').forEach(radio => {
            radio.addEventListener('change', function() {
                buildInteractiveOverlay(parseInt(this.value));
            });
        });

        // Initial launch run
        buildInteractiveOverlay(9);
    </script>
</body>
</html>


