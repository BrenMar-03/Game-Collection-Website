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
            <a href="{{ url('/console') }}" class="nav-link text-white d-none d-md-block">Consoles</a>
            <a href="{{ url('/emulators') }}" class="nav-link text-white d-none d-md-block">Emulators</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Sign Out
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>