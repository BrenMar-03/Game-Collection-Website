<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - Dashboard Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
        .card-stat { border-left: 5px solid; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark-custom shadow-sm sticky-top py-2 px-3">
        <div class="container-fluid d-flex align-items-center">
            <button class="btn btn-dark p-1 me-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-4"></i>
            </button>
            <a href="{{ url('/welcome') }}" class="navbar-brand fw-bold m-0 me-auto">
                <span class="brand-blue">Game</span><span class="brand-red">Spawn</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ url('/games') }}" class="nav-link text-white d-none d-md-block">Games</a>
                <a href="{{ url('/consoles') }}" class="nav-link text-white d-none d-md-block">Consoles</a>
                <a href="{{ url('/emulators') }}" class="nav-link text-white d-none d-md-block">Emulators</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                        Logout
                    </button>
                </form>
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
                <a href="Dashboard.html" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
                <a href="UserProfile.html" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
                <a href="UserManagement.html" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
                <a href="Extra.html" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
                <a href="Home.html" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Home</a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">System Analytics</h2>
        
        <div class="row g-4 mb-5">
            <div class="col-md-3"><div class="card p-3 card-stat" style="border-left-color: #00c3e3;"><h6>Total Games</h6><h3>24</h3></div></div>
            <div class="col-md-3"><div class="card p-3 card-stat" style="border-left-color: #ffc107;"><h6>Active Consoles</h6><h3>8</h3></div></div>
            <div class="col-md-3"><div class="card p-3 card-stat" style="border-left-color: #28a745;"><h6>Total Hours</h6><h3>450+</h3></div></div>
            <div class="col-md-3"><div class="card p-3 card-stat" style="border-left-color: #6f42c1;"><h6>Avg Rating</h6><h3>4.7/5</h3></div></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4 bg-white p-3 rounded shadow-sm"><canvas id="chart1"></canvas></div>
            <div class="col-md-4 bg-white p-3 rounded shadow-sm"><canvas id="chart2"></canvas></div>
            <div class="col-md-4 bg-white p-3 rounded shadow-sm"><canvas id="chart3"></canvas></div>
        </div>
    </div>

    <footer class="py-4 mt-5 bg-dark-custom text-white text-center">
        <small class="text-white-50">GameSpawn 2026</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const config = (type, label, data, colors) => ({
            type: type,
            data: { labels: label, datasets: [{ data: data, backgroundColor: colors }] }
        });

        new Chart(document.getElementById('chart1'), config('doughnut', ['Action', 'RPG', 'Puzzle'], [10, 8, 6], ['#ff4554', '#00c3e3', '#ffc107']));
        new Chart(document.getElementById('chart2'), config('bar', ['PS5', 'Switch', 'PC', 'Retro'], [5, 12, 4, 3], ['#6f42c1', '#ff4554', '#28a745', '#ffc107']));
        new Chart(document.getElementById('chart3'), config('line', ['Jan', 'Feb', 'Mar', 'Apr'], [10, 15, 8, 20], ['#00c3e3']));
    </script>
</body>
</html>
