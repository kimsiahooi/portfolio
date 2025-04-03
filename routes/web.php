<?php

use App\Http\Controllers\GithubAuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Github Auth Router
Route::middleware('guest')->group(function () {
    Route::prefix('auth/github')->name('github.')->group(function () {
        Route::get('redirect', [GithubAuthController::class, 'redirect'])->name('redirect');
        Route::get('callback', [GithubAuthController::class, 'callback'])->name('callback');
    });
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
