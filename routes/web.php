<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImamController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Masjid management routes
    Route::get('/masjids', [AdminController::class, 'masjids'])->name('masjids');
    Route::get('/masjids/create', [AdminController::class, 'createMasjid'])->name('masjids.create');
    Route::post('/masjids', [AdminController::class, 'storeMasjid'])->name('masjids.store');
    Route::get('/masjids/{masjid}', [AdminController::class, 'showMasjid'])->name('masjids.show');
    Route::get('/masjids/{masjid}/edit', [AdminController::class, 'editMasjid'])->name('masjids.edit');
    Route::put('/masjids/{masjid}', [AdminController::class, 'updateMasjid'])->name('masjids.update');
    Route::delete('/masjids/{masjid}', [AdminController::class, 'destroyMasjid'])->name('masjids.destroy');
    
    // Imam management routes
    Route::get('/imams', [AdminController::class, 'imams'])->name('imams');
    Route::get('/imams/create', [AdminController::class, 'createImam'])->name('imams.create');
    Route::post('/imams', [AdminController::class, 'storeImam'])->name('imams.store');
    Route::get('/imams/{imam}', [AdminController::class, 'showImam'])->name('imams.show');
    Route::get('/imams/{imam}/edit', [AdminController::class, 'editImam'])->name('imams.edit');
    Route::put('/imams/{imam}', [AdminController::class, 'updateImam'])->name('imams.update');
    Route::delete('/imams/{imam}', [AdminController::class, 'destroyImam'])->name('imams.destroy');
    
    // Imam-Masjid assignments
    Route::post('/imams/{imam}/masjids', [AdminController::class, 'assignImamToMasjid'])->name('imams.assign');
    Route::delete('/imams/{imam}/masjids/{masjid}', [AdminController::class, 'unassignImamFromMasjid'])->name('imams.unassign');
});



// Imam routes section
Route::middleware(['auth', 'imam'])->prefix('imam')->name('imam.')->group(function () {
    Route::get('/dashboard', [ImamController::class, 'dashboard'])->name('dashboard');
    
    // Prayer Times routes
    Route::get('/masjids/{masjid}/prayer-times', [ImamController::class, 'prayerTimes'])->name('prayer-times');
    Route::get('/masjids/{masjid}/prayer-times/create', [ImamController::class, 'createPrayerTime'])->name('prayer-times.create');
    Route::post('/masjids/{masjid}/prayer-times', [ImamController::class, 'storePrayerTime'])->name('prayer-times.store');
    Route::get('/masjids/{masjid}/prayer-times/{prayerTime}/edit', [ImamController::class, 'editPrayerTime'])->name('prayer-times.edit');
    Route::put('/masjids/{masjid}/prayer-times/{prayerTime}', [ImamController::class, 'updatePrayerTime'])->name('prayer-times.update');
    Route::delete('/masjids/{masjid}/prayer-times/{prayerTime}', [ImamController::class, 'destroyPrayerTime'])->name('prayer-times.destroy');

    
// Announcement routes
Route::get('/masjids/{masjid}/announcements', [ImamController::class, 'announcements'])->name('announcements');
Route::get('/masjids/{masjid}/announcements/create', [ImamController::class, 'createAnnouncement'])->name('announcements.create');
Route::post('/masjids/{masjid}/announcements', [ImamController::class, 'storeAnnouncement'])->name('announcements.store');
Route::get('/masjids/{masjid}/announcements/{announcement}', [ImamController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('/masjids/{masjid}/announcements/{announcement}/edit', [ImamController::class, 'editAnnouncement'])->name('announcements.edit');
Route::put('/masjids/{masjid}/announcements/{announcement}', [ImamController::class, 'updateAnnouncement'])->name('announcements.update');
Route::delete('/masjids/{masjid}/announcements/{announcement}', [ImamController::class, 'destroyAnnouncement'])->name('announcements.destroy');

});
