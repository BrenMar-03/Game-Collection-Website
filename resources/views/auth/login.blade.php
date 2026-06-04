<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login - GameSpawn</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background:rgba(240, 240, 240, 0.97);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
            }
            .card {
                display: flex;
                width: 100%;
                max-width: 780px;
                min-height: 460px;
                box-shadow: 0 4px 24px rgba(253, 253, 253, 0.16);
                border-radius: 4px;
                overflow: hidden;
                background: #fff;
            }
            .panel-left {
                background: #1a3ee8;
                color: #fff;
                padding: 2.5rem 2rem;
                width: 42%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .brand { font-size: 1.1rem; font-weight: 700; letter-spacing: 0.02em; }
            .panel-left h2 { font-size: 2.4rem; font-weight: 800; line-height: 1.15; margin-bottom: 1rem; }
            .panel-left p { font-size: 0.9rem; line-height: 1.6; opacity: 0.9; }
            .panel-right { padding: 2.5rem 2.5rem; width: 58%; display: flex; flex-direction: column; justify-content: center; }
            .panel-right h1 { font-size: 1.75rem; font-weight: 800; color: #111; margin-bottom: 0.4rem; }
            .panel-right .subtitle { font-size: 0.88rem; color: #666; margin-bottom: 1.75rem; }
            .form-group { margin-bottom: 1rem; }
            .form-input {
                width: 100%; padding: 0.75rem 1rem;
                border: 1px solid #d1d5db; border-radius: 4px;
                font-size: 0.95rem; color: #333; outline: none; transition: border-color 0.2s;
            }
            .form-input:focus { border-color: #1a3ee8; }
            .form-input::placeholder { color: #aaa; }
            .error-text { color: #dc2626; font-size: 0.78rem; margin-top: 0.3rem; }
            .row-options { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; font-size: 0.85rem; }
            .remember { display: flex; align-items: center; gap: 0.4rem; color: #555; }
            .remember input { accent-color: #1a3ee8; }
            .forgot { color: #1a3ee8; text-decoration: none; font-weight: 500; }
            .forgot:hover { text-decoration: underline; }
            .btn-login {
                width: 100%; padding: 0.8rem; background: #1a3ee8; color: #fff;
                border: none; border-radius: 4px; font-size: 0.95rem; font-weight: 700;
                cursor: pointer; letter-spacing: 0.03em; transition: background 0.2s;
            }
            .btn-login:hover { background: #1432c4; }
            .register-link { text-align: center; margin-top: 1.25rem; font-size: 0.85rem; color: #666; }
            .register-link a { color: #1a3ee8; font-weight: 600; text-decoration: none; }
            .register-link a:hover { text-decoration: underline; }
            @media (max-width: 600px) { .panel-left { display: none; } .panel-right { width: 100%; } }
        </style>
    </head>
    <body>
    <div class="card">
        <div class="panel-left">
            <div class="brand">GameSpawn</div>
            <div>
                <h2>Welcome Back.</h2>
                <p>Immerse yourself into the world of gaming. All your gaming info that you need are here so give it a try.</p>
            </div>
            <div></div>
        </div>
        <div class="panel-right">
            <h1>Sign In</h1>
            <p class="subtitle">Please enter your credentials to access your dashboard.</p>
    
            @if (session('status'))
                <div style="background:#d1fae5;border:1px solid #6ee7b7;color:#065f46;padding:0.75rem 1rem;border-radius:4px;font-size:0.85rem;margin-bottom:1rem;">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                    @error('email')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-input" placeholder="Password" required autocomplete="current-password">
                    @error('password')<p class="error-text">{{ $message }}</p>@enderror
                </div>
                <div class="row-options">
                    <label class="remember">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot">Forgot password?</a>
                    @endif
                </div>
                <button type="submit" class="btn-login">Log In</button>
                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Create one</a>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
    </x-guest-layout>