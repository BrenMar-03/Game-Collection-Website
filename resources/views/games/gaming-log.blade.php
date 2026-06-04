<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn - My Gaming Log</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark-custom shadow-sm sticky-top py-2 px-3">
        <div class="container-fluid d-flex align-items-center">
            <button class="btn btn-dark p-1 me-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <i class="bi bi-list fs-4"></i>
            </button>
            <a href="Home.html" class="navbar-brand fw-bold m-0 me-auto">
                <span class="brand-blue">Game</span><span class="brand-red">Spawn</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="GameList.html" class="nav-link text-white d-none d-md-block">Games</a>
                <a href="ConsoleList.html" class="nav-link text-white d-none d-md-block">Consoles</a>
                <a href="EmulatorList.html" class="nav-link text-white d-none d-md-block">Emulators</a>
                <a href="UserLogin.html" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Sign Out</a>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>My Gaming Log</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gameModal">Add Record</button>
        </div>

        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Game Title</th>
                        <th>Device</th>
                        <th>Hours</th>
                        <th>Rating</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="logTableBody">
                    <tr>
                        <td>Pokémon Emerald</td>
                        <td>GBA</td>
                        <td>45</td>
                        <td>5/5</td>
                        <td>Classic favorite</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Persona 3 FES</td>
                        <td>PS2</td>
                        <td>82</td>
                        <td>4.8/5</td>
                        <td>Great story</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Zelda: BotW</td>
                        <td>Switch</td>
                        <td>120</td>
                        <td>5/5</td>
                        <td>Best open world</td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="gameModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Game Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="gameForm">
                        <div class="mb-2"><label>Game Title</label><input type="text" id="title" class="form-control" required></div>
                        <div class="mb-2"><label>Device</label><input type="text" id="device" class="form-control" required></div>
                        <div class="row">
                            <div class="col-6 mb-2"><label>Hours</label><input type="number" id="hours" class="form-control" required></div>
                            <div class="col-6 mb-2"><label>Rating</label><input type="text" id="rating" class="form-control" required></div>
                        </div>
                        <div class="mb-2"><label>Comments</label><textarea id="comments" class="form-control"></textarea></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="saveRecord()">Save Record</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5 bg-dark-custom text-white text-center">
        <small class="text-white-50">GameSpawn 2026</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function saveRecord() {
            const title = document.getElementById('title').value;
            const device = document.getElementById('device').value;
            const hours = document.getElementById('hours').value;
            const rating = document.getElementById('rating').value;
            const comments = document.getElementById('comments').value;
            const tbody = document.getElementById('logTableBody');
            const row = tbody.insertRow();
            row.innerHTML = `<td>${title}</td><td>${device}</td><td>${hours}</td><td>${rating}</td><td>${comments}</td>
                             <td><button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                 <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button></td>`;
            bootstrap.Modal.getInstance(document.getElementById('gameModal')).hide();
        }
        document.addEventListener('click', function(e) {
            if (e.target.closest('.delete-btn')) e.target.closest('tr').remove();
        });
    </script>
</body>
</html>
