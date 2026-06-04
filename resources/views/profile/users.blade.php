<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
        .nav-link-header { color: rgba(255, 255, 255, 0.85); text-decoration: none; font-size: 0.9rem; }
        .nav-link-header:hover { color: #fff; }
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
            <div class="input-group mx-auto" style="max-width: 300px; min-width: 150px;">
                <input type="text" class="form-control form-control-sm" placeholder="Search database...">
                <button class="btn btn-outline-light btn-sm"><i class="bi bi-search"></i></button>
            </div>
            <div class="d-flex align-items-center gap-2 ms-2">
                <a href="UserLogin.html" class="btn btn-outline-light btn-sm text-nowrap">Sign Out</a>
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
                <a href="dashboard" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
                <a href="profile" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
                <a href="users" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
                <a href="gaming-log" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
                <a href="welcome" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Home</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Manage Users</h3>
            <button class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add New User</button>
        </div>
        
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>FULL NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kentaro Wolfgang Baltazar</td>
                            <td>KenKen@email.com</td>
                            <td>May 31, 2026</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5 bg-dark-custom text-white text-center">
        <small class="text-white-50">GameSpawn 2026</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
