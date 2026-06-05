<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn – Manage Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:        #111214;
            --surface:   #1a1c1f;
            --border:    #2a2d32;
            --text:      #e8eaed;
            --muted:     #6b7280;
            --accent:    #e53935;
            --accent2:   #4fc3f7;
            --green:     #22c55e;
            --yellow:    #f59e0b;
            --radius:    8px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            min-height: 100vh;
        }

        /* ── NAV ── */
        nav {
            background: #0d0f11;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            height: 60px;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo { font-family: 'Rajdhani', sans-serif; font-size: 22px; font-weight: 700; letter-spacing: 1px; }
        .logo span:first-child { color: var(--accent2); }
        .logo span:last-child  { color: var(--accent); }

        .nav-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 6px 14px;
            width: 280px;
        }
        .nav-search input {
            background: none;
            border: none;
            color: var(--text);
            font-size: 13px;
            width: 100%;
            outline: none;
        }
        .nav-search input::placeholder { color: var(--muted); }
        .nav-search svg { color: var(--muted); flex-shrink: 0; }

        .btn-signout {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--muted);
            padding: 7px 18px;
            border-radius: var(--radius);
            cursor: pointer;
            font-size: 13px;
            transition: all .2s;
        }
        .btn-signout:hover { border-color: var(--accent); color: var(--accent); }

        /* ── MAIN ── */
        main { max-width: 1100px; margin: 0 auto; padding: 40px 24px; }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .page-header h1 {
            font-family: 'Rajdhani', sans-serif;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: .5px;
        }

        .btn-primary {
            background: var(--accent2);
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: var(--radius);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: opacity .2s, transform .1s;
        }
        .btn-primary:hover { opacity: .88; transform: translateY(-1px); }

        /* ── FLASH ── */
        .alert {
            padding: 12px 18px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .alert-success { background: rgba(34,197,94,.12); border: 1px solid rgba(34,197,94,.3); color: var(--green); }
        .alert-error   { background: rgba(229,57,53,.12);  border: 1px solid rgba(229,57,53,.3);  color: var(--accent); }

        /* ── TABLE ── */
        .table-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }
        thead { background: #16181b; }
        th {
            text-align: left;
            padding: 14px 20px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
            border-bottom: 1px solid var(--border);
        }
        td { padding: 14px 20px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255,255,255,.02); }

        /* user cell */
        .user-cell { display: flex; align-items: center; gap: 12px; }
        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--border);
            flex-shrink: 0;
        }
        .user-name  { font-weight: 500; color: var(--text); }
        .user-email { font-size: 12px; color: var(--muted); margin-top: 2px; }

        /* role badge */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .5px;
            text-transform: uppercase;
        }
        .badge-admin { background: rgba(229,57,53,.15); color: var(--accent); border: 1px solid rgba(229,57,53,.3); }
        .badge-user  { background: rgba(79,195,247,.12); color: var(--accent2); border: 1px solid rgba(79,195,247,.25); }

        .date-cell { color: var(--muted); font-size: 13px; }

        /* actions */
        .actions { display: flex; gap: 8px; }
        .btn-icon {
            width: 34px;
            height: 34px;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: transparent;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            text-decoration: none;
            color: var(--muted);
        }
        .btn-icon:hover.edit   { border-color: var(--accent2); color: var(--accent2); background: rgba(79,195,247,.08); }
        .btn-icon:hover.delete { border-color: var(--accent);  color: var(--accent);  background: rgba(229,57,53,.08); }

        /* empty state */
        .empty { text-align: center; padding: 60px 20px; color: var(--muted); }
        .empty svg { margin-bottom: 12px; opacity: .4; }
        .empty p { font-size: 15px; }

        /* pagination */
        .pagination { display: flex; justify-content: center; gap: 6px; margin-top: 28px; }
        .pagination a, .pagination span {
            padding: 7px 13px;
            border-radius: 6px;
            border: 1px solid var(--border);
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
            transition: all .2s;
        }
        .pagination a:hover { border-color: var(--accent2); color: var(--accent2); }
        .pagination .active span {
            background: var(--accent2);
            border-color: var(--accent2);
            color: #000;
            font-weight: 600;
        }

        /* delete modal */
        .modal-backdrop {
            display: none;
            position: fixed; inset: 0;
            background: rgba(0,0,0,.7);
            z-index: 200;
            align-items: center;
            justify-content: center;
        }
        .modal-backdrop.open { display: flex; }
        .modal {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 32px;
            width: 380px;
            text-align: center;
        }
        .modal h3 { font-family: 'Rajdhani', sans-serif; font-size: 20px; margin-bottom: 10px; }
        .modal p  { color: var(--muted); font-size: 13px; margin-bottom: 24px; line-height: 1.6; }
        .modal-actions { display: flex; gap: 10px; justify-content: center; }
        .btn-cancel {
            padding: 9px 22px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background: transparent;
            color: var(--muted);
            font-size: 13px;
            cursor: pointer;
            transition: all .2s;
        }
        .btn-cancel:hover { border-color: var(--text); color: var(--text); }
        .btn-danger {
            padding: 9px 22px;
            border-radius: var(--radius);
            border: none;
            background: var(--accent);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity .2s;
        }
        .btn-danger:hover { opacity: .85; }

        footer { text-align: center; color: var(--muted); font-size: 12px; padding: 32px; }
    </style>
</head>
<body>

{{-- ── NAV ── --}}
<nav>
    <div class="logo"><span>Game</span><span>Spawn</span></div>

    <form action="{{ route('users.index') }}" method="GET" style="display:contents">
        <div class="nav-search">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
            </svg>
            <input type="text" name="search" placeholder="Search users…" value="{{ request('search') }}">
        </div>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn-signout" type="submit">Sign Out</button>
    </form>
</nav>

{{-- ── MAIN ── --}}
<main>
    <div class="page-header">
        <h1>Manage Users</h1>
        <a href="{{ route('users.create') }}" class="btn-primary">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Add New User
        </a>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="alert alert-success">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <div class="user-cell">
                            <img
                                class="avatar"
                                src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=e53935&color=fff&bold=true&size=128' }}"
                                alt="{{ $user->name }}"
                            >
                            <div>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="user-email">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge {{ $user->role === 'admin' ? 'badge-admin' : 'badge-user' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="date-cell">{{ $user->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('users.edit', $user) }}" class="btn-icon edit" title="Edit">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </a>
                            <button
                                class="btn-icon delete"
                                title="Delete"
                                onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')"
                            >
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                                    <path d="M10 11v6M14 11v6"/>
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="empty">
                            <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            <p>No users found{{ request('search') ? ' for "'.request('search').'"' : '' }}.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($users->hasPages())
        <div class="pagination">
            {{ $users->links() }}
        </div>
    @endif
</main>

{{-- ── DELETE MODAL ── --}}
<div class="modal-backdrop" id="deleteModal">
    <div class="modal">
        <h3>Delete User?</h3>
        <p id="deleteModalText">This action cannot be undone.</p>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form id="deleteForm" method="POST" style="display:contents">
                @csrf
                @method('DELETE')
                <button class="btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>

<footer>GameSpawn {{ date('Y') }}</footer>

<script>
function openDeleteModal(id, name) {
    document.getElementById('deleteModalText').textContent =
        `You're about to permanently delete "${name}". This cannot be undone.`;
    document.getElementById('deleteForm').action = `/users/${id}`;
    document.getElementById('deleteModal').classList.add('open');
}
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('open');
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>

</body>
</html>