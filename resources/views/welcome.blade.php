<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Home</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
        .nav-link-header { color: rgba(255, 255, 255, 0.85); text-decoration: none; font-size: 0.9rem; transition: 0.3s; }
        .nav-link-header:hover { color: #fff; }
        .game-card, .console-card, .emulator-card { border: 1px solid #dee2e6; border-radius: 8px; transition: 0.3s; }
        .game-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .card-img-placeholder { height: 140px; background-color: #f8f9fa; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #adb5bd; margin-bottom: 12px; }
        .rating-star { color: #ffc107; font-size: 0.85rem; }
        .section-label { font-size: 0.7rem; font-weight: bold; padding: 2px 8px; border-radius: 4px; float: right; }
        .label-game { background: #e3f2fd; color: #0d6efd; }
        .label-console { background: #fff3e0; color: #e65100; }
        .label-emulator { background: #e8f5e9; color: #2e7d32; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark-custom py-2 px-2">
        <div class="container-fluid">
            <button class="btn btn-dark p-1 me-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-4"></i>
            </button>
            <a href="{{ url('/welcome') }}" class="navbar-brand fw-bold m-0 me-auto">                  
                <span class="brand-blue">Game</span><span class="brand-red">Spawn</span>
            </a>
            <div class="my-2 my-md-0 mx-md-4 flex-grow-1 d-none d-md-flex" style="max-width: 400px;">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search games...">
                    <span class="input-group-text bg-white border-start-0 text-muted"><i class="bi bi-search"></i></span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="/games" class="nav-link-header d-none d-md-block">Games</a>
                <a href="/consoles" class="nav-link-header d-none d-md-block">Consoles</a>
                <a href="/emulators" class="nav-link-header d-none d-md-block">Emulators</a>
                
                @auth
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center gap-2" 
                                style="background: transparent; border: 1px solid rgba(255,255,255,0.5);">
                            <i class="bi bi-box-arrow-right"></i> Sign Out
                        </button>
                    </form>
                @endauth
            </div>
            </div>
        </div>
    </nav>


    <div class="offcanvas offcanvas-start bg-dark-custom text-white" id="sidebarMenu" style="width: 280px;">
        <div class="offcanvas-header border-bottom border-secondary">
            <h5 class="offcanvas-title">GameSpawn</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="list-group list-group-flush">
                <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
                <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
                <a href="{{ url('/users') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
                <a href="{{ url('/gaming-log') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Explore Game Database Collection</h2>
            <p class="text-muted mx-auto" style="max-width: 700px;">Browse through thousands of items curated across collections of legendary games, systems, hardware specs, and software emulators.</p>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-bold">List of Games</h4>
            <a href="{{ url('/games') }}" class="btn btn-info btn-sm text-white fw-bold">MORE GAMES</a>
        </div>
        
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card game-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-game">GAME MODULE</span>
                    <img src="Homg/ChronoTrigger.jpg" class="card-img-top" alt="Chrono Trigger">
                    <h6 class="fw-bold mb-1">Chrono Trigger</h6>
                    <p class="text-muted" style="font-size: 0.75rem;">Legendary RPG developed by Square for the SNES.</p>
                    <div class="mt-auto pt-2 border-top">
                        <small class="d-block text-muted"><i class="bi bi-calendar3"></i> 1995-03-11</small>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted">84 Reviews</small>
                            <span><i class="bi bi-star-fill rating-star"></i> <small class="fw-bold">5.0</small></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card game-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-game">GAME MODULE</span>
                    <img src="Homg/Zelda.jpg" class="card-img-top" alt="Zelda"> 
                    <h6 class="fw-bold mb-1">The Legend of Zelda: A Link to the Past</h6>
                    <p class="text-muted" style="font-size: 0.75rem;">Action adventure set in the high fantasy kingdom of Hyrule.</p>
                    <div class="mt-auto pt-2 border-top">
                        <small class="d-block text-muted"><i class="bi bi-calendar3"></i> 1991-11-21</small>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted">20 Reviews</small>
                            <span><i class="bi bi-star-fill rating-star"></i> <small class="fw-bold">4.8</small></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card game-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-game">GAME MODULE</span>
                    <img src="Homg/PkmnEme.jpg" class="card-img-top" alt="Pokemon Emerald">
                    <h6 class="fw-bold mb-1">Pokemon Emerald</h6>
                    <p class="text-muted" style="font-size: 0.75rem;">The definitive 2004 RPG for the Game Boy Advance.</p>
                    <div class="mt-auto pt-2 border-top">
                        <small class="d-block text-muted"><i class="bi bi-calendar3"></i> 2004-09-16</small>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted">38 Reviews</small>
                            <span><i class="bi bi-star-fill rating-star"></i> <small class="fw-bold">4.5</small></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card game-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-game">GAME MODULE</span>
                    <img src="Homg/Persona3.jpg" class="card-img-top" alt="Persona3">
                    <h6 class="fw-bold mb-1">Persona 3 FES</h6>
                    <p class="text-muted" style="font-size: 0.75rem;">Revised RPG balancing social sim with dungeon crawling.</p>
                    <div class="mt-auto pt-2 border-top">
                        <small class="d-block text-muted"><i class="bi bi-calendar3"></i> 2007-04-19</small>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted">42 Reviews</small>
                            <span><i class="bi bi-star-fill rating-star"></i> <small class="fw-bold">4.8</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consoles Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-bold">List of Gaming Consoles</h4>
            <a href="{{ url('/consoles') }}" class="btn btn-danger btn-sm text-white fw-bold">MORE CONSOLES</a>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card console-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-console">HARDWARE MODULE</span>
                    <img src="Homg/NTDswitch.jpg" class="card-img-top" alt="Nintendo Switch">
                    <h6 class="fw-bold mb-1">Nintendo Switch</h6>
                    <p class="text-muted" style="font-size: 0.7rem;">Hybrid console offering both portable and home play.</p>
                    <div class="mt-auto pt-2">
                        <p class="fw-bold text-dark mb-1">Price: $299.99</p>
                        <p class="text-muted mb-2" style="font-size: 0.65rem;">Specs: Nvidia Tegra X1 Processor</p>
                        <div class="d-flex gap-1 flex-wrap">
                            <span class="badge label-game">Mario</span>
                            <span class="badge label-game">Zelda</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Other consoles remain the same with asset() helper -->
            <div class="col-md-3">
                <div class="card console-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-console">HARDWARE MODULE</span>
                    <img src="Homg/Drmc.jpg" class="card-img-top" alt="Dreamcast">
                    <h6 class="fw-bold mb-1">SEGA Dreamcast</h6>
                    <p class="text-muted" style="font-size: 0.7rem;">First console to include a built-in modular modem.</p>
                    <div class="mt-auto pt-2">
                        <p class="fw-bold text-dark mb-1">Price: $199.99</p>
                        <p class="text-muted mb-2" style="font-size: 0.65rem;">Specs: Hitachi SH-4 32-bit RISC</p>
                        <div class="d-flex gap-1 flex-wrap">
                            <span class="badge label-game">Sonic</span>
                            <span class="badge label-game">Crazy Taxi</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card console-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-console">HARDWARE MODULE</span>
                    <img src="Homg/X360.jpg" class="card-img-top" alt="Dreamcast">
                    <h6 class="fw-bold mb-1">XBOX 360</h6>
                    <p class="text-muted" style="font-size: 0.7rem;">Revolutionary console known for online gaming dominance.</p>
                    <div class="mt-auto pt-2">
                        <p class="fw-bold text-dark mb-1">Price: $299.99</p>
                        <p class="text-muted mb-2" style="font-size: 0.65rem;">Specs: Xenon Power PC Architecture</p>
                        <div class="d-flex gap-1 flex-wrap">
                            <span class="badge label-game">Halo</span>
                            <span class="badge label-game">Gears</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card console-card h-100 p-3 shadow-sm bg-white">
                    <span class="section-label label-console">HARDWARE MODULE</span>
                    <img src="Homg/PS2.jpg" class="card-img-top" alt="PS2">
                    <h6 class="fw-bold mb-1">PlayStation 2</h6>
                    <p class="text-muted" style="font-size: 0.7rem;">Best-selling console known for its DVD player and library.</p>
                    <div class="mt-auto pt-2">
                        <p class="fw-bold text-dark mb-1">Price: $299.00</p>
                        <p class="text-muted mb-2" style="font-size: 0.65rem;">Specs: Emotion Engine CPU</p>
                        <div class="d-flex gap-1 flex-wrap">
                            <span class="badge label-game">GTA</span>
                            <span class="badge label-game">Resident Evil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Add remaining console cards similarly -->
            
        </div>

        <!-- Emulators Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-bold">List of Gaming Emulators</h4>
            <a href="{{ url('/emulators') }}" class="btn btn-success btn-sm text-white fw-bold">MORE EMULATORS</a>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card emulator-card p-4 shadow-sm bg-white">
                    <img src="Homg/Retro.jpg" class="card-img-top" alt="Arch">
                    <span class="section-label label-emulator">SOFTWARE CORE</span>
                    <h6 class="fw-bold mb-2">RetroArch</h6>
                    <p class="text-muted small">Frontend for emulators, game engines, and media players.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card emulator-card p-4 shadow-sm bg-white">
                    <img src="Homg/PcX.jpg" class="card-img-top" alt="X2">
                    <span class="section-label label-emulator">SOFTWARE CORE</span>
                    <h6 class="fw-bold mb-2">PCSX2</h6>
                    <p class="text-muted small">Open-source software aiming to replicate console compatibility.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card emulator-card p-4 shadow-sm bg-white">
                    <img src="Homg/Dolphin.jpg" class="card-img-top" alt="Emu">
                    <span class="section-label label-emulator">SOFTWARE CORE</span>
                    <h6 class="fw-bold mb-2">Dolphin</h6>
                    <p class="text-muted small">High performance and accurate emulator for Nintendo systems.</p>
                </div>
            <!-- Add other emulator cards similarly -->
        </div>
    </div>

    <footer class="py-4 mt-5 bg-dark-custom text-white text-center">
        <div class="container">
            <p class="small mb-1">GameSpawn © {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>