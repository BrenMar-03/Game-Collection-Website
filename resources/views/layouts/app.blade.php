<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GameSpawn - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .brand-blue { color: #00c3e3; }
        .brand-red { color: #ff4554; }
        .bg-dark-custom { background-color: #212529 !important; }
    </style>
    @stack('styles')
</head>
<body class="bg-light">

@include('layouts.navbar')

<div class="offcanvas offcanvas-start bg-dark-custom text-white" id="sidebarMenu" style="width: 280px;">
    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title">GameSpawn</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="list-group list-group-flush">
            <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Dashboard Overview</a>
            <a href="{{ url('/profile') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">User Info</a>
            <a href="{{ url('/users') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Users</a>
            <a href="{{ url('/gaming-log') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-0 py-3">My Gaming Log</a>
            <a href="{{ url('/welcome') }}" class="list-group-item list-group-item-action bg-dark-custom text-white border-secondary py-3">Home</a>
        </div>
    </div>
</div>

<main>
    @yield('content')
</main>

<footer class="py-4 mt-5 bg-dark-custom text-white text-center">
    <small class="text-white-50">GameSpawn 2026</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>