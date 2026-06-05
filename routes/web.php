<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamingLogController;
use App\Http\Controllers\UsersController;

// Use Laravel's built-in auth routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'create'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


// Your custom routes
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/games', function () {
    return view('games.index');
});

Route::get('/consoles', function () {
    return view('consoles.index'); 
});

Route::get('/emulators', function () {
    return view('emulators.index');
});

Route::get('/dashboard', function () {
    return redirect('/welcome');
})->middleware('auth');

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware('auth')->name('profile.edit');

Route::get('/users', function () {
    return view('profile.users');
})->middleware('auth')->name('profile.users');

Route::middleware(['auth'])->group(function () {
    Route::get('/gaming-log', [GamingLogController::class, 'index'])->name('gaming-log');
    Route::post('/gaming-log', [GamingLogController::class, 'store'])->name('gaming-log.store');
    Route::put('/gaming-log/{id}', [GamingLogController::class, 'update'])->name('gaming-log.update');
    Route::delete('/gaming-log/{id}', [GamingLogController::class, 'destroy'])->name('gaming-log.destroy');
});
// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
 
    // Users CRUD — accessible at /users
    Route::resource('users', UsersController::class)
        ->except(['show']); // No show/detail page needed per design
 
});
