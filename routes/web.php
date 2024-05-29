<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ParcelDetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);
Route::post('/track', [LandingController::class, 'track']);


Route::get(
    '/dashboard',
    [ParcelController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'parcel' => ParcelController::class,
        'parcelDetails' => ParcelDetailController::class,
    ]);
});

require __DIR__ . '/auth.php';
