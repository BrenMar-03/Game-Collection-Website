<x-guest-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register - GameSpawn</title>
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; }
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: #f0f0f0;
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
                box-shadow: 0 4px 24px rgba(0,0,0,0.12);
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
            .panel-right .subtitle { font-size: 0.88rem; color: #666; margin-bottom: 1.5rem; }
            .form-group { margin-bottom: 1rem; }
            .form-input {
                width: 100%; padding: 0.75rem 1rem;
                border: 1px solid #d1d5db; border-radius: 4px;
                font-size: 0.95rem; color: #333; outline: none; transition: border-color 0.2s;
            }
            .form-input:focus { border-color: #1a3ee8; }
            .form-input::placeholder { color: #aaa; }
            .error-text { color: #dc2626; font-size: 0.78rem; margin-top: 0.3rem; }
            .btn-register {
                width: 100%; padding: 0.8rem; background: #1a3ee8; color: #fff;
                border: none; border-radius: 4px; font-size: 0.95rem; font-weight: 700;
                cursor: pointer; letter-spacing: 0.03em; transition: background 0.2s;
                margin-bottom: 1.25rem;
            }
            .btn-register:hover { background: #1432c4; }
            .login-link { text-align: center; font-size: 0.85rem; color: #666; }
            .login-link a { color: #1a3ee8; font-weight: 600; text-decoration: none; }
            .login-link a:hover { text-decoration: underline; }
            @media (max-width: 600px) { .panel-left { display: none; } .panel-right { width: 100%; } }
        </style>
    </head>
    <body>
    <div class="card">
        <div class="panel-left">
            <div class="brand">GameSpawn</div>
            <div>
                <h2>Create Account</h2>
                <p>Sign up here if you do not have an account yet to access your dashboard.</p>
            </div>
            <div></div>
        </div>
        <div class="panel-right">
            <h1>Register</h1>
            <p class="subtitle">Don't have an account? Create one below.</p>
    
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <div class="form-group">
                    <input type="text" name="name" class="form-input" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                    @error('name')<p class="error-text">{{ $message }}</p>@enderror
                </div>
    
                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Email address" value="{{ old('email') }}" required>
                    @error('email')<p class="error-text">{{ $message }}</p>@enderror
                </div>
    
                <div class="form-group">
                    <input type="password" name="password" class="form-input" placeholder="Password" required autocomplete="new-password">
                    @error('password')<p class="error-text">{{ $message }}</p>@enderror
                </div>
    
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm Password" required autocomplete="new-password">
                    @error('password_confirmation')<p class="error-text">{{ $message }}</p>@enderror
                </div>
    
                <button type="submit" class="btn-register">Create Account</button>
    
                <div class="login-link">
                    Back to <a href="{{ route('login') }}">Sign in</a>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
    </x-guest-layout>