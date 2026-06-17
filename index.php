<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palette Customizer - School System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mystyle.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-slate shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">🏫 SchoolSystem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
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
        
        <div class="row g-4 justify-content-center align-items-center">
            
            <div class="col-md-6 d-flex flex-column align-items-center">
                <h3 class="fw-bold text-slate mb-3">Your Custom Case</h3>
                
                <div class="compact-case shadow-lg p-4">
                    <div class="grid-container">
                        <div class="pan-slot active-target" data-id="1">1</div>
                        <div class="pan-slot" data-id="2">2</div>
                        <div class="pan-slot" data-id="3">3</div>
                        <div class="pan-slot" data-id="4">4</div>
                        <div class="pan-slot" data-id="5">5</div>
                        <div class="pan-slot" data-id="6">6</div>
                        <div class="pan-slot" data-id="7">7</div>
                        <div class="pan-slot" data-id="8">8</div>
                        <div class="pan-slot" data-id="9">9</div>
                    </div>
                </div>
                <p class="text-muted mt-3 small">Targeting: <span id="targetBadge" class="badge bg-primary">Slot 1</span></p>
            </div>

            <div class="col-md-5">
                <div class="card p-4 border-0 shadow-sm bg-white rounded-3">
                    <h4 class="fw-bold text-slate mb-2">Build Your Look</h4>
                    <p class="text-secondary small mb-4">Click a circle slot on the left, then choose a pigment color below to inject it.</p>
                    
                    <h6 class="fw-bold text-slate mb-3">Select Shade Color:</h6>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="color-dot" style="background-color: #c48c6a;" title="Maca (Caramel)" onclick="applyColor('#c48c6a')"></div>
                        <div class="color-dot" style="background-color: #5d3266;" title="Galaxy (Purple)" onclick="applyColor('#5d3266')"></div>
                        <div class="color-dot" style="background-color: #dca7a7;" title="Rose Shimmer" onclick="applyColor('#dca7a7')"></div>
                        <div class="color-dot" style="background-color: #22252a;" title="Midnight Onyx" onclick="applyColor('#22252a')"></div>
                        <div class="color-dot" style="background-color: #455a47;" title="Forest Moss" onclick="applyColor('#455a47')"></div>
                        <div class="color-dot" style="background-color: #e5b869;" title="Golden Glow" onclick="applyColor('#e5b869')"></div>
                    </div>

                    <button class="btn btn-dark w-100 mt-5 fw-bold bg-slate border-0 py-2">Save Custom Configuration</button>
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

        // Set up click listeners for the slots
        document.querySelectorAll('.pan-slot').forEach(slot => {
            slot.addEventListener('click', function() {
                document.querySelectorAll('.pan-slot').forEach(s => s.classList.remove('active-target'));
                this.classList.add('active-target');
                currentActiveSlot = this.getAttribute('data-id');
                document.getElementById('targetBadge').innerText = `Slot ${currentActiveSlot}`;
            });
        });

        // Function to assign background color to active selection
        function applyColor(hexColor) {
            let activeTargetEl = document.querySelector(`.pan-slot[data-id="${currentActiveSlot}"]`);
            if(activeTargetEl) {
                activeTargetEl.style.backgroundColor = hexColor;
                activeTargetEl.innerText = ""; // Removes the placeholder number text
            }
        }
    </script>
</body>
</html>


