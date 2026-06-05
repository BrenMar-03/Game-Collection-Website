<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Consoles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .brand-blue { color: #00c3e3; 
        }
        .brand-red { color: #ff4554; 
        }
        .bg-dark-custom { background-color: #212529 !important; 
        }
        .nav-link { color: rgba(255, 255, 255, 0.85) !important; font-size: 0.85rem; padding: 0.5rem !important; 
        }
        
        .module-card { border: 1px solid #dee2e6; border-radius: 8px; overflow: hidden; background: #fff; 
        }
        .module-header { font-size: 0.7rem; font-weight: 700; padding: 0.5rem; color: #fff; }
        .module-img { height: 120px; background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #eee; 
        }
        .tag-btn { font-size: 0.7rem; padding: 2px 8px; border-radius: 4px; background: #e7f5ff; color: #228be4; display: inline-block; margin-right: 4px; 
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark-custom py-2 px-2">
        <div class="container-fluid">
            <button class="btn btn-dark p-1 me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"><i class="bi bi-list fs-4"></i></button>
            <a href="{{ url('/') }}" class="navbar-brand fw-bold m-0 me-2"><span class="brand-blue">Game</span><span class="brand-red">Spawn</span></a>
            
            <div class="d-flex align-items-center ms-auto">
                <div class="d-none d-md-flex mx-3" style="width: 200px;">
                    <input type="text" class="form-control form-control-sm" placeholder="Search...">
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
        </div>
    </nav>

    <div class="offcanvas offcanvas-start bg-dark-custom text-white" id="sidebarMenu" style="width: 250px;">
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

    <div class="container my-5"> <h3 class="mb-4">List of Gaming Consoles</h3>
    
    <div class="row g-4"> 
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">              
                <div class="module-header" style="background-color: #e60012;">NINTENDO</div>
                <div class="module-img">
    <img src="/Console1.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
</div>
                <div class="p-3"><h6 class="fw-bold mb-1">Switch</h6>
                <small class="text-muted d-block mb-2">$299 | Mario, Zelda</small>
                </div>
            </div>
         </div>
         
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #f7a900;">SEGA
                </div>
                <div class="module-img">
                    <img src="ConsoleImg/Console2.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Dream">
                </div>
                <div class="p-3"><h6 class="fw-bold mb-1">Dreamcast</h6><small class="text-muted d-block mb-2">$199 | Sonic, Shenmue</small>
                </div>
           </div>
       </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #107c10;">XBOX</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console3.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="X360">
                    </div>
                    <div class="p-3"><h6 class="fw-bold mb-1">Xbox 360</h6><small class="text-muted d-block mb-2">$299 | Halo, Gears</small>
                    </div>
                </div>
            </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #0070d1;">SONY</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console4.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="PS2">
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">PS2</h6>
                        <small class="text-muted d-block mb-2">$299 | GTA, God of War</small>
                        </div>
                     </div>
                 </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #ff9f43;">NINTENDO</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console5.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3"><h6 class="fw-bold mb-1">3DS</h6>
                    <small class="text-muted d-block mb-2">$169 | Pokemon, AC</small>
                    </div>
                 </div>
              </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #54a0ff;">SONY</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console6.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3"><h6 class="fw-bold mb-1">PS Vita</h6>
                    <small class="text-muted d-block mb-2">$199 | Persona, Uncharted</small>
                    </div>
                 </div>
              </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #ff9f43;">NINTENDO</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console7.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3"><h6 class="fw-bold mb-1">Game Boy</h6>
                    <small class="text-muted d-block mb-2">$89 | Tetris, Metroid</small>
                    </div>
                 </div>
              </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #ee5253;">ATARI</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console8.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">Lynx</h6>
                        <small class="text-muted d-block mb-2">$129 | Blue Lightning</small>
                        </div>
                     </div>
                  </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #5f27cd;">SEGA</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console9.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">GameGear</h6>
                        <small class="text-muted d-block mb-2">$149 | Sonic</small>
                        </div>
                     </div>
                  </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #222f3e;">VALVE</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console10.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">Steam Deck</h6>
                        <small class="text-muted d-block mb-2">$399 | Portal</small>
                        </div>
                     </div>
                 </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #ff6b6b;">NINTENDO</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console11.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                    </div>
                    <div class="p-3">
                        <h6 class="fw-bold mb-1">DS Lite</h6>
                        <small class="text-muted d-block mb-2">$129 | Mario Kart</small>
                        </div>
                     </div>
                  </div>
        
        <div class="col-6 col-md-3">
            <div class="module-card h-100 shadow-sm">
                <div class="module-header" style="background-color: #48dbfb;">SNK</div>
                <div class="module-img">
                    <img src="ConsoleImg/Console12.jpg" style="height: 110px; width: auto; object-fit: contain;" alt="Switch">
                </div>
                <div class="p-3">
                    <h6 class="fw-bold mb-1">NeoGeo</h6>
                    <small class="text-muted d-block mb-2">$159 | Metal Slug</small>
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
