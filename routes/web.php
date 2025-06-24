<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolygonsController;
use App\Http\Controllers\PolylinesController;
use App\Http\Controllers\SaranDestinasiController;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/saran', [SaranDestinasiController::class, 'store'])->name('saran.store');
Route::get('/saran', [SaranDestinasiController::class, 'index'])->name('saran.index');
Route::delete('/saran/{id}', [SaranDestinasiController::class, 'destroy'])->name('saran.destroy');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('points', PointsController::class);
Route::resource('polylines', PolylinesController::class);
Route::resource('polygons', PolygonsController::class);

Route::get('/map', [PointsController::class, 'index'])->middleware(['auth', 'verified'])->name('map');
Route::get('/table', [TableController::class, 'index'])->name('table');

require __DIR__.'/auth.php';
