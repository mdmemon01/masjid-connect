<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes - KEEP ONLY THIS ONE
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/masjids', [AdminController::class, 'masjids'])->name('masjids');
    Route::get('/imams', [AdminController::class, 'imams'])->name('imams');
});

// Imam Routes
Route::middleware(['auth', 'imam'])->prefix('imam')->name('imam.')->group(function () {
    Route::get('/dashboard', function () {
        return view('imam.dashboard');
    })->name('dashboard');
});