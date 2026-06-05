<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpawn – Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #111214; --surface: #1a1c1f; --surface2: #1f2124;
            --border: #2a2d32; --text: #e8eaed; --muted: #6b7280;
            --accent: #e53935; --accent2: #4fc3f7; --green: #22c55e;
            --radius: 8px;
        }
        body { background: var(--bg); color: var(--text); font-family: 'Inter', sans-serif; font-size: 14px; min-height: 100vh; }

        nav {
            background: #0d0f11; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 32px; height: 60px; position: sticky; top: 0; z-index: 100;
        }
        .logo { font-family: 'Rajdhani', sans-serif; font-size: 22px; font-weight: 700; letter-spacing: 1px; }
        .logo span:first-child { color: var(--accent2); }
        .logo span:last-child  { color: var(--accent); }
        .nav-back { display: flex; align-items: center; gap: 6px; color: var(--muted); text-decoration: none; font-size: 13px; transition: color .2s; }
        .nav-back:hover { color: var(--text); }

        main { max-width: 680px; margin: 0 auto; padding: 48px 24px; }

        .page-header { margin-bottom: 32px; display: flex; align-items: center; gap: 16px; }
        .page-header-avatar { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border); }
        .page-header h1 { font-family: 'Rajdhani', sans-serif; font-size: 24px; font-weight: 700; }
        .page-header p  { color: var(--muted); font-size: 13px; margin-top: 2px; }

        .form-card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
        .form-section { padding: 24px 28px; border-bottom: 1px solid var(--border); }
        .form-section:last-child { border-bottom: none; }
        .section-title { font-family: 'Rajdhani', sans-serif; font-size: 14px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; color: var(--muted); margin-bottom: 20px; }

        .form-group { margin-bottom: 18px; }
        .form-group:last-child { margin-bottom: 0; }
        label { display: block; font-size: 12px; font-weight: 500; color: var(--muted); margin-bottom: 7px; letter-spacing: .3px; text-transform: uppercase; }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%; background: var(--surface2); border: 1px solid var(--border);
            color: var(--text); font-family: 'Inter', sans-serif; font-size: 14px;
            padding: 10px 14px; border-radius: var(--radius); outline: none; transition: border-color .2s;
        }
        input:focus, select:focus { border-color: var(--accent2); }
        input::placeholder { color: var(--muted); }
        select option { background: var(--surface); }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

        .photo-upload { display: flex; align-items: center; gap: 20px; }
        .photo-preview { width: 72px; height: 72px; border-radius: 50%; background: var(--surface2); border: 2px solid var(--border); display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; }
        .photo-preview img { width: 100%; height: 100%; object-fit: cover; }
        .photo-upload-btn { background: var(--surface2); border: 1px dashed var(--border); color: var(--muted); padding: 10px 16px; border-radius: var(--radius); font-size: 13px; cursor: pointer; transition: all .2s; display: inline-flex; align-items: center; gap: 8px; }
        .photo-upload-btn:hover { border-color: var(--accent2); color: var(--accent2); }
        .photo-hint { font-size: 11px; color: var(--muted); margin-top: 5px; }
        input[type="file"] { display: none; }

        .field-error { color: var(--accent); font-size: 11px; margin-top: 5px; }
        .input-error { border-color: var(--accent) !important; }

        .password-hint { font-size: 11px; color: var(--muted); margin-top: 5px; display: flex; align-items: center; gap: 4px; }

        .form-footer { padding: 20px 28px; display: flex; align-items: center; justify-content: flex-end; gap: 12px; }
        .btn-cancel { padding: 9px 22px; border-radius: var(--radius); border: 1px solid var(--border); background: transparent; color: var(--muted); font-size: 13px; cursor: pointer; text-decoration: none; transition: all .2s; }
        .btn-cancel:hover { border-color: var(--text); color: var(--text); }
        .btn-primary { background: var(--accent2); color: #000; border: none; padding: 10px 24px; border-radius: var(--radius); font-size: 13px; font-weight: 600; cursor: pointer; transition: opacity .2s, transform .1s; }
        .btn-primary:hover { opacity: .88; transform: translateY(-1px); }

        footer { text-align: center; color: var(--muted); font-size: 12px; padding: 32px; }
    </style>
</head>
<body>

<nav>
    <div class="logo"><span>Game</span><span>Spawn</span></div>
    <a href="{{ route('users.index') }}" class="nav-back">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 12H5M12 5l-7 7 7 7"/>
        </svg>
        Back to Users
    </a>
</nav>

<main>
    <div class="page-header">
        <img
            class="page-header-avatar"
            src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=e53935&color=fff&bold=true&size=128' }}"
            alt="{{ $user->name }}"
            id="headerAvatar"
        >
        <div>
            <h1>Edit User</h1>
            <p>{{ $user->email }}</p>
        </div>
    </div>

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-card">

            {{-- Profile Photo --}}
            <div class="form-section">
                <div class="section-title">Profile Photo</div>
                <div class="photo-upload">
                    <div class="photo-preview" id="photoPreview">
                        @if($user->profile_photo)
                            <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="{{ $user->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=e53935&color=fff&bold=true&size=128" alt="{{ $user->name }}">
                        @endif
                    </div>
                    <div>
                        <label for="profile_photo" class="photo-upload-btn" style="display:inline-flex; cursor:pointer;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="17 8 12 3 7 8"/>
                                <line x1="12" y1="3" x2="12" y2="15"/>
                            </svg>
                            Change Photo
                        </label>
                        <input type="file" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewPhoto(event)">
                        <p class="photo-hint">Leave empty to keep current photo · Max 2MB</p>
                        @error('profile_photo') <p class="field-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Basic Info --}}
            <div class="form-section">
                <div class="section-title">Account Info</div>

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name', $user->name) }}"
                        class="{{ $errors->has('name') ? 'input-error' : '' }}"
                        required>
                    @error('name') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email', $user->email) }}"
                        class="{{ $errors->has('email') ? 'input-error' : '' }}"
                        required>
                    @error('email') <p class="field-error">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" class="{{ $errors->has('role') ? 'input-error' : '' }}" required>
                        <option value="user"  {{ old('role', $user->role) === 'user'  ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Password --}}
            <div class="form-section">
                <div class="section-title">Change Password</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password"
                            placeholder="Leave blank to keep current"
                            class="{{ $errors->has('password') ? 'input-error' : '' }}">
                        @error('password') <p class="field-error">{{ $message }}</p> @enderror
                        <p class="password-hint">
                            <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                            Only fill in to change the password
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Repeat new password">
                    </div>
                </div>
            </div>

        </div>{{-- /form-card --}}

        <div class="form-footer" style="background:var(--surface); border:1px solid var(--border); border-top:1px solid var(--border); border-radius:0 0 12px 12px; margin-top:-1px;">
            <a href="{{ route('users.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-primary">Save Changes</button>
        </div>

    </form>
</main>

<footer>GameSpawn {{ date('Y') }}</footer>

<script>
function previewPhoto(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        document.getElementById('photoPreview').innerHTML = `<img src="${ev.target.result}" alt="Preview">`;
        document.getElementById('headerAvatar').src = ev.target.result;
    };
    reader.readAsDataURL(file);
}
</script>

</body>
</html>