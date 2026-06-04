<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
        .nav-link-header { color: #fff; text-decoration: none; font-size: 0.9rem; }
        
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark-custom shadow-sm sticky-top py-2 px-3">
        <div class="container-fluid d-flex align-items-center flex-nowrap">
            <button class="btn btn-dark p-1 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-4"></i>
            </button>
            <a href="Home.html" class="navbar-brand fw-bold m-0 me-3 text-nowrap">
                <span class="brand-blue">Game</span><span class="brand-red">Spawn</span>
            </a>
            <div class="d-flex align-items-center gap-2 ms-2">
                <a href="UserLogin.html" class="btn btn-outline-light btn-sm text-nowrap">Sign Out</a>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start bg-dark-custom text-white" id="sidebarMenu" style="width: 280px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">GameSpawn</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
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
    </div>

    <div class="container my-5" style="max-width: 600px;">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-4">Edit Profile</h4>
            <div class="mb-3">
                <label class="form-label">Upload Profile Picture</label>
                <input type="file" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" class="form-control" placeholder="Enter contact number">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" rows="2"></textarea>
            </div>
            <button class="btn btn-primary w-100">Update Information</button>
        </div>
    </div>
    
    <footer class="py-4 mt-5 bg-dark-custom text-white text-center">
        <small class="text-white-50">GameSpawn 2026</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
