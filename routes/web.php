<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ArticleController;

// ─── PUBLIC ROUTES ──────────────────────────────────────────────
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/artikel/{slug}', [NewsController::class, 'show'])->name('article.show');

// ─── ADMIN ROUTES ───────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Protected admin routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/password', [AuthController::class, 'showPasswordForm'])->name('password.edit');
        Route::post('/password', [AuthController::class, 'updatePassword'])->name('password.update');

        // Article CRUD
        Route::resource('articles', ArticleController::class);
    });
});
