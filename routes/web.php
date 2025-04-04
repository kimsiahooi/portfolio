<?php

use App\Http\Controllers\GithubAuthController;
use App\Http\Controllers\WordleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Github Auth Router
Route::middleware('guest')->group(function () {
    Route::prefix('auth/github')->name('github.')->group(function () {
        Route::get('redirect', [GithubAuthController::class, 'redirect'])->name('redirect');
        Route::get('callback', [GithubAuthController::class, 'callback'])->name('callback');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Route
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard Route
        Route::get('dashboard', function () {
            return inertia('Dashboard');
        })->name('dashboard');

        // Mini Games Route
        Route::prefix('minigames')->name('minigames.')->group(function () {
            // Wordle
            Route::resource('wordle', WordleController::class);
        });
    });
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
