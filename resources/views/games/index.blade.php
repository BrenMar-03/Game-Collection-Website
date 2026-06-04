<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Master Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .brand-blue { color: #00c3e3 !important; }
        .brand-red { color: #ff4554 !important; }
        .collection-card { background-color: #fff; border: 1px solid #e3e6f0; border-radius: 0.35rem; overflow: hidden; height: 100%; display: flex; flex-direction: column; }
        .card-img-top { height: 160px; object-fit: cover; }
        .rating-star { color: #ffc107; }
        .nav-link-text { color: white; text-decoration: none; font-size: 0.9rem; }
        .bg-dark-custom {
        background-color:rgba(26, 26, 46, 0) !important;
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
                <input type="text" class="form-control" placeholder="Search games...">
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
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">GameSpawn</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="list-group list-group-flush">
                <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
                <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
                <a href="{{ url('/users') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
                <a href="{{ url('/show') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
                <a href="{{ url('/welcome') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">Home</a>
            </div>
        </div>
</div>

<div class="container my-5">
    <h3 class="mb-4">Master Games Database</h3>
    <div class="row g-4">
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game1.jpg" class="card-img-top"><div class="p-3 flex-grow-1">
                    <h6>Mario Kart 8</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">Switch</span>
                    <p class="small text-muted">Peak kart racing.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2017</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 4.9</small>
                            </div>
                       </div>
                  </div>
                  
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game2.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1">
                    <h6>Pokemon Emerald</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">GBA</span>
                    <p class="small text-muted">Classic journey.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2004</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 4.8</small>
                            </div>
                        </div>
                    </div>
                    
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game3.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Zelda: BotW</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">Switch</span>
                <p class="small text-muted">Open world freedom.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between">
                    <small>2017</small>
                    <small class="fw-bold">
                        <i class="bi bi-star-fill rating-star"></i> 5.0</small>
                        </div>
                    </div>
                </div>
                
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game4.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Halo 3</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">Xbox</span>
                <p class="small text-muted">Legendary combat.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between">
                    <small>2007</small>
                    <small class="fw-bold">
                        <i class="bi bi-star-fill rating-star"></i> 4.9</small>
                        </div>
                     </div>
                 </div>
                 
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game5.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1">
                    <h6>God of War II</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">PS2</span>
                    <p class="small text-muted">Action defined.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2007</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 4.8</small>
                            </div>
                        </div>
                    </div>
                    
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game6.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Persona 3</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">PS2</span>
                <p class="small text-muted">Deep social RPG.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between">
                    <small>2006</small>
                    <small class="fw-bold">
                        <i class="bi bi-star-fill rating-star"></i> 4.7</small>
                        </div>
                    </div>
                </div>
                
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game7.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1">
                    <h6>Bloodborne</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">PS4</span>
                    <p class="small text-muted">Dark combat.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2015</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 4.9</small>
                            </div>
                        </div>
                    </div>
                    
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game8.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1">
                    <h6>Sonic Adv 2</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">DC</span>
                    <p class="small text-muted">High-speed fun.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2001</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 4.6</small>
                            </div>
                        </div>
                    </div>
                    
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game9.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Final Fantasy X</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">PS2</span>
                <p class="small text-muted">Emotional story.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between">
                    <small>2001</small>
                    <small class="fw-bold">
                        <i class="bi bi-star-fill rating-star"></i> 4.9</small>
                        </div>
                    </div>
                </div>
                
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game10.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Skyrim</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">PC</span>
                <p class="small text-muted">Endless adventure.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between">
                    <small>2011</small>
                    <small class="fw-bold">
                        <i class="bi bi-star-fill rating-star"></i> 4.8</small>
                        </div>
                    </div>
                </div>
                
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game11.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1">
                    <h6>Portal 2</h6>
                    <span class="badge bg-primary-subtle text-primary mb-2">PC</span>
                    <p class="small text-muted">Puzzle genius.</p>
                    </div>
                    <div class="p-3 border-top d-flex justify-content-between">
                        <small>2011</small>
                        <small class="fw-bold">
                            <i class="bi bi-star-fill rating-star"></i> 5.0</small>
                            </div>
                        </div>
                    </div>
                    
        <div class="col-6 col-md-4 col-lg-3">
            <div class="collection-card shadow-sm">
                <img src="GameImg/Game12.jpg" class="card-img-top">
                <div class="p-3 flex-grow-1"><h6>Mass Effect 2</h6>
                <span class="badge bg-primary-subtle text-primary mb-2">Xbox</span>
                <p class="small text-muted">Best space opera.</p>
                </div>
                <div class="p-3 border-top d-flex justify-content-between"><small>2010</small>
                <small class="fw-bold">
                    <i class="bi bi-star-fill rating-star"></i> 4.9</small>
                    </div>
                </div>
            </div>
    </div>
</div>

<footer class="text-center py-4 mt-5 bg-dark text-white">
    <p>GameSpawn Administration Portal</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
