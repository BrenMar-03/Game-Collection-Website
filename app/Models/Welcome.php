<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameSpawn - Home</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        /* NAV */
        .gs-navbar {
            background: #1a1a2e;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        .gs-nav-left { display: flex; align-items: center; gap: 1.5rem; }
        .gs-hamburger { color: #fff; font-size: 1.2rem; cursor: pointer; background: none; border: none; }
        .gs-logo { font-size: 1.25rem; font-weight: 800; text-decoration: none; }
        .gs-logo span:first-child { color: #00aaff; }
        .gs-logo span:last-child { color: #e63946; }
        .gs-nav-links { display: flex; align-items: center; gap: 1.5rem; }
        .gs-nav-link { color: #ccc; text-decoration: none; font-size: 0.95rem; transition: color 0.2s; }
        .gs-nav-link:hover { color: #fff; }
        .gs-btn-outline {
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: transparent; border: 1px solid #555;
            color: #ccc; padding: 0.4rem 1rem; border-radius: 4px;
            font-size: 0.85rem; cursor: pointer; text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }
        .gs-btn-outline:hover { border-color: #fff; color: #fff; }
        .gs-btn-primary-nav {
            background: #1a3ee8; color: #fff; border: none;
            padding: 0.45rem 1.1rem; border-radius: 4px;
            font-size: 0.85rem; font-weight: 600; cursor: pointer;
            text-decoration: none; transition: background 0.2s;
        }
        .gs-btn-primary-nav:hover { background: #1432c4; }
        .gs-user-name { color: #aaa; font-size: 0.85rem; }

        /* HERO */
        .gs-hero {
            text-align: center;
            padding: 3.5rem 1rem 2.5rem;
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
        }
        .gs-hero h1 { font-size: 2rem; font-weight: 800; color: #111; margin-bottom: 0.75rem; }
        .gs-hero p { font-size: 0.95rem; color: #666; max-width: 560px; margin: 0 auto 1.5rem; line-height: 1.6; }
        .gs-hero-actions { display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; }
        .gs-btn-hero-primary {
            background: #1a3ee8; color: #fff; border: none;
            padding: 0.65rem 1.5rem; border-radius: 4px;
            font-size: 0.9rem; font-weight: 700; cursor: pointer;
            text-decoration: none; transition: background 0.2s;
        }
        .gs-btn-hero-primary:hover { background: #1432c4; }
        .gs-btn-hero-outline {
            background: #fff; color: #1a3ee8; border: 1px solid #1a3ee8;
            padding: 0.65rem 1.5rem; border-radius: 4px;
            font-size: 0.9rem; font-weight: 700; cursor: pointer;
            text-decoration: none; transition: all 0.2s;
        }
        .gs-btn-hero-outline:hover { background: #1a3ee8; color: #fff; }

        /* STATS BAR */
        .gs-stats {
            background: #1a1a2e;
            display: flex;
            justify-content: center;
            gap: 3rem;
            padding: 1rem 2rem;
            flex-wrap: wrap;
        }
        .gs-stat { text-align: center; }
        .gs-stat-number { font-size: 1.4rem; font-weight: 800; color: #00aaff; }
        .gs-stat-label { font-size: 0.75rem; color: #888; text-transform: uppercase; letter-spacing: 0.06em; }

        /* SEARCH BAR */
        .gs-search-wrap {
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
            padding: 1rem 2rem;
            display: flex;
            gap: 0.75rem;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        .gs-search-input {
            flex: 1; padding: 0.6rem 1rem;
            border: 1px solid #d1d5db; border-radius: 4px;
            font-size: 0.9rem; outline: none;
        }
        .gs-search-input:focus { border-color: #1a3ee8; }
        .gs-search-btn {
            background: #1a3ee8; color: #fff; border: none;
            padding: 0.6rem 1.25rem; border-radius: 4px;
            font-size: 0.9rem; font-weight: 600; cursor: pointer;
            transition: background 0.2s;
        }
        .gs-search-btn:hover { background: #1432c4; }

        /* SECTION */
        .gs-section { max-width: 1200px; margin: 2rem auto; padding: 0 1.5rem; }
        .gs-section-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 1.25rem; flex-wrap: wrap; gap: 0.75rem;
        }
        .gs-section-title { font-size: 1.2rem; font-weight: 700; color: #111; }
        .gs-btn-more {
            background: #1a3ee8; color: #fff; border: none;
            padding: 0.5rem 1.2rem; font-size: 0.8rem; font-weight: 700;
            letter-spacing: 0.05em; cursor: pointer; text-decoration: none;
            border-radius: 2px; text-transform: uppercase;
        }
        .gs-btn-more:hover { background: #1432c4; }

        /* GRID */
        .gs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 1.25rem;
        }

        /* CARD */
        .gs-card {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            overflow: hidden;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .gs-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.1); transform: translateY(-2px); }
        .gs-card-label {
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.08em;
            color: #1a3ee8; padding: 0.6rem 0.75rem 0.4rem;
            text-transform: uppercase;
        }
        .gs-card-img {
            width: 100%; aspect-ratio: 3/4; object-fit: cover; display: block;
        }
        .gs-card-img-placeholder {
            width: 100%; aspect-ratio: 3/4;
            background: linear-gradient(135deg, #e8eaf6, #c5cae9);
            display: flex; align-items: center; justify-content: center;
            font-size: 3rem; color: #9fa8da;
        }
        .gs-card-body { padding: 0.75rem; }
        .gs-card-title { font-size: 0.95rem; font-weight: 700; color: #111; margin-bottom: 0.3rem; }
        .gs-card-desc { font-size: 0.82rem; color: #666; line-height: 1.5; margin-bottom: 0.6rem; }
        .gs-card-meta { font-size: 0.75rem; color: #999; margin-bottom: 0.75rem; }
        .gs-card-meta span { margin-right: 0.75rem; }
        .gs-card-actions { display: flex; gap: 0.4rem; flex-wrap: wrap; }
        .gs-btn-card-view {
            font-size: 0.78rem; font-weight: 600; padding: 0.35rem 0.85rem;
            background: #1a3ee8; color: #fff; border: none; border-radius: 3px;
            cursor: pointer; text-decoration: none; transition: background 0.2s;
        }
        .gs-btn-card-view:hover { background: #1432c4; }
        .gs-btn-card-edit {
            font-size: 0.78rem; font-weight: 600; padding: 0.35rem 0.85rem;
            background: #fff; color: #555; border: 1px solid #d1d5db;
            border-radius: 3px; cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .gs-btn-card-edit:hover { border-color: #1a3ee8; color: #1a3ee8; }
        .gs-btn-card-delete {
            font-size: 0.78rem; font-weight: 600; padding: 0.35rem 0.85rem;
            background: #fff; color: #dc2626; border: 1px solid #fca5a5;
            border-radius: 3px; cursor: pointer; text-decoration: none; transition: all 0.2s;
        }
        .gs-btn-card-delete:hover { background: #dc2626; color: #fff; border-color: #dc2626; }

        /* ALERT */
        .gs-alert { padding: 0.75rem 1rem; border-radius: 4px; font-size: 0.85rem; margin-bottom: 1.25rem; }
        .gs-alert-success { background: #d1fae5; border: 1px solid #6ee7b7; color: #065f46; }

        /* EMPTY */
        .gs-empty { text-align: center; padding: 4rem 1rem; color: #888; }
        .gs-empty-icon { font-size: 3.5rem; margin-bottom: 1rem; }
        .gs-empty h3 { font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; color: #555; }
        .gs-empty p { margin-bottom: 1.25rem; font-size: 0.9rem; }

        /* FOOTER */
        .gs-footer {
            background: #1a1a2e; color: #666;
            text-align: center; padding: 1.5rem;
            font-size: 0.8rem; margin-top: 3rem;
        }
        .gs-footer a { color: #00aaff; text-decoration: none; }

        @media (max-width: 600px) {
            .gs-navbar { padding: 0 1rem; }
            .gs-nav-links { gap: 0.75rem; }
            .gs-stats { gap: 1.5rem; }
        }
    </style>
</head>
<body>

    <!-- NAV -->
    <nav class="gs-navbar">
        <div class="gs-nav-left">
            <button class="gs-hamburger">☰</button>
            <a href="{{ url('/') }}" class="gs-logo">
                <span>Game</span><span>Spawn</span>
            </a>
        </div>
        <div class="gs-nav-links">
            <a href="{{ url('/') }}" class="gs-nav-link">Games</a>
            <a href="#" class="gs-nav-link">Consoles</a>
            <a href="#" class="gs-nav-link">Emulators</a>
            @auth
                <span class="gs-user-name">{{ Auth::user()->name }}</span>
                <a href="{{ route('games.create') }}" class="gs-btn-primary-nav">+ Add Game</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="gs-btn-outline">⇒ Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="gs-nav-link">Sign In</a>
                <a href="{{ route('register') }}" class="gs-btn-primary-nav">Register</a>
            @endauth
        </div>
    </nav>

    <!-- HERO -->
    <div class="gs-hero">
        <h1>Explore Game Database Collection</h1>
        <p>Browse through thousands of items curated across collections of legendary games, systems, hardware specs, and software emulators.</p>
        <div class="gs-hero-actions">
            <a href="{{ route('games.index') }}" class="gs-btn-hero-primary">Browse All Games</a>
            @auth
                <a href="{{ route('games.create') }}" class="gs-btn-hero-outline">+ Add a Game</a>
            @else
                <a href="{{ route('register') }}" class="gs-btn-hero-outline">Create Account</a>
            @endauth
        </div>
    </div>

    <!-- STATS -->
    <div class="gs-stats">
        <div class="gs-stat">
            <div class="gs-stat-number">{{ $totalGames }}</div>
            <div class="gs-stat-label">Games Listed</div>
        </div>
        <div class="gs-stat">
            <div class="gs-stat-number">{{ $totalUsers }}</div>
            <div class="gs-stat-label">Contributors</div>
        </div>
        <div class="gs-stat">
            <div class="gs-stat-number">{{ $recentGames }}</div>
            <div class="gs-stat-label">Added This Week</div>
        </div>
    </div>

    <!-- SEARCH -->
    <div style="background:#fff;border-bottom:1px solid #e5e5e5;padding:1rem 2rem;">
        <form method="GET" action="{{ route('games.index') }}" style="max-width:1200px;margin:0 auto;display:flex;gap:0.75rem;">
            <input type="text" name="search" class="gs-search-input" placeholder="Search games by title, genre, platform..." value="{{ request('search') }}">
            <button type="submit" class="gs-search-btn">Search</button>
        </form>
    </div>

    <!-- GAMES LIST -->
    <div class="gs-section">

        @if(session('success'))
            <div class="gs-alert gs-alert-success">{{ session('success') }}</div>
        @endif

        <div class="gs-section-header">
            <h2 class="gs-section-title">List of Games <span style="font-size:0.85rem;font-weight:400;color:#888;">({{ $totalGames }} total)</span></h2>
            <div style="display:flex;gap:0.5rem;align-items:center;">
                @auth
                    <a href="{{ route('games.create') }}" class="gs-btn-more">+ Add Game</a>
                @endauth
                <a href="{{ route('games.index') }}" class="gs-btn-more" style="background:#555;">View All</a>
            </div>
        </div>

        @if($games->isEmpty())
            <div class="gs-empty">
                <div class="gs-empty-icon">🎮</div>
                <h3>No Games Yet</h3>
                <p>Be the first to add a game to the database.</p>
                @auth
                    <a href="{{ route('games.create') }}" class="gs-btn-hero-primary">Add First Game</a>
                @else
                    <a href="{{ route('register') }}" class="gs-btn-hero-primary">Register to Add Games</a>
                @endauth
            </div>
        @else
            <div class="gs-grid">
                @foreach($games as $game)
                    <div class="gs-card">
                        <div class="gs-card-label">Game Module</div>
                        @if($game->cover_image)
                            <img src="{{ Storage::url($game->cover_image) }}" alt="{{ $game->title }}" class="gs-card-img">
                        @else
                            <div class="gs-card-img-placeholder">🎮</div>
                        @endif
                        <div class="gs-card-body">
                            <div class="gs-card-title">{{ $game->title }}</div>
                            @if($game->description)
                                <p class="gs-card-desc">{{ Str::limit($game->description, 75) }}</p>
                            @endif
                            <div class="gs-card-meta">
                                @if($game->genre)<span>🎯 {{ $game->genre }}</span>@endif
                                @if($game->platform)<span>🖥 {{ $game->platform }}</span>@endif
                                @if($game->release_year)<span>📅 {{ $game->release_year }}</span>@endif
                            </div>
                            <div class="gs-card-actions">
                                <a href="{{ route('games.show', $game) }}" class="gs-btn-card-view">View</a>
                                @auth
                                    @if(Auth::id() === $game->user_id)
                                        <a href="{{ route('games.edit', $game) }}" class="gs-btn-card-edit">Edit</a>
                                        <form method="POST" action="{{ route('games.destroy', $game) }}" onsubmit="return confirm('Delete this game?')" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="gs-btn-card-delete">Delete</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- FOOTER -->
    <div class="gs-footer">
        &copy; {{ date('Y') }} <a href="{{ url('/') }}">GameSpawn</a> — Game Database Collection
    </div>

</body>
</html>