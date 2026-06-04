<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Emulators</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .brand-blue { color: #00c3e3 !important; 
        }
        .brand-red { color: #ff4554 !important; 
        }
        .collection-card { background-color: #fff; border: 1px solid #e3e6f0; border-radius: 0.35rem; overflow: hidden; height: 100%; display: flex; flex-direction: column; }
        .card-img-top { height: 100px; object-fit: contain; padding: 15px; background-color: #f8f9fa; 
        }
        .nav-link-text { color: white; text-decoration: none; font-size: 0.9rem; 
        }
        .offcanvas.bg-dark-custom {
            background-color:rgba(26, 26, 46, 0) !important;
        }
        
        .list-group-item.bg-dark-custom {
            background-color:rgba(26, 26, 46, 0);
            color: white;
        }
        
        .list-group-item.bg-dark-custom:hover {
            background-color:rgba(45, 45, 68, 0) !important;
            color: white;
        }
        
        .border-secondary {
            border-color: #374151 !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark sticky-top py-2 px-3">
    <div class="container-fluid d-flex align-items-center">
        <button class="btn btn-dark p-1 me-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
            <i class="bi bi-list fs-4"></i>
        </button>
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2 m-0 me-auto" href="#">
            <span class="brand-blue">Game</span><span class="brand-red">Spawn</span>
        </a>
        <div class="my-2 my-md-0 mx-md-4 flex-grow-1 d-none d-md-flex" style="max-width: 400px;">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search emulators...">
                <span class="input-group-text bg-white border-start-0 text-muted"><i class="bi bi-search"></i></span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="{{ url('/games') }}" class="nav-link text-white d-none d-md-block">Games</a>
            <a href="{{ url('/consoles') }}" class="nav-link text-white d-none d-md-block">Consoles</a>
            <a href="{{ url('/emulators') }}" class="nav-link text-white d-none d-md-block">Emulators</a>
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
</nav>

<div class="offcanvas offcanvas-start bg-dark text-white" id="sidebarMenu" style="width: 250px;">
    <div class="offcanvas-header"><h5 class="offcanvas-title">GameSpawn</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button></div>
    <div class="offcanvas-body p-0">
        <div class="offcanvas-body p-0">
            <div class="list-group list-group-flush">
                <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
                <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
                <a href="{{ url('/users') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
                <a href="{{ url('/gaming-log') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
                <a href="{{ url('/welcome') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">Home</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h3 class="mb-2">Emulation Software Cores</h3>
    <p class="text-muted mb-4">Manage optimization profiles and architecture compatibility.</p>
    
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu1.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>RetroArch</h6>
                <span class="badge bg-secondary mb-2">Multi-System</span>
                <p class="small text-muted">Frontend for game engines.</p>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu2.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>PCSX2</h6>
                <span class="badge bg-secondary mb-2">PlayStation 2</span>
                <p class="small text-muted">PS2 emulation software.</p>
                </div>
            </div>
        </div>
        
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu3.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>Dolphin</h6>
                    <span class="badge bg-secondary mb-2">GameCube/Wii</span>
                    <p class="small text-muted">High-performance emulation.</p>
                    </div>
                </div>
            </div>
            
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu4.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>PPSSPP</h6>
                    <span class="badge bg-secondary mb-2">PSP</span>
                    <p class="small text-muted">Fast portable PSP emulation.</p>
                    </div>
                </div>
            </div>
            
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu5.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>Citra</h6>
                    <span class="badge bg-secondary mb-2">Nintendo 3DS</span>
                    <p class="small text-muted">3DS rendering core.</p>
                    </div>
                </div>
            </div>
            
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu6.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>My Boy</h6>
                    <span class="badge bg-secondary mb-2">Game Boy Advance</span>
                    <p class="small text-muted">Highly optimized core.</p>
                    </div>
                </div>
            </div>
            
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu7.jpg" class="card-img-top"><div class="p-3">
                    <h6>RPCS3</h6>
                    <span class="badge bg-secondary mb-2">PlayStation 3</span>
                    <p class="small text-muted">Complex cell-architecture.</p>
                    </div>
                </div>
            </div>
            
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="Games/EmulatorImg/Emu8.jpg" class="card-img-top">
                <div class="p-3">
                    <h6>DuckStation</h6>
                    <span class="badge bg-secondary mb-2">PlayStation 1</span>
                    <p class="small text-muted">Flawless PGXP correction.</p>
                    </div>
                </div>
            </div>
    </div>
</div>

<footer class="text-center py-4 mt-5 bg-dark text-white">
    <p>GameSpawn 2026</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
