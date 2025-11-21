<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewParcelController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ParcelDetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::resource('/', LandingController::class);
Route::post('/track', [LandingController::class, 'track']);


Route::get(
    '/dashboard',
    [NewParcelController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'parcel' => ParcelController::class,
        'parcelDetails' => ParcelDetailController::class,
    ]);

    Route::resource('new-parcel', NewParcelController::class);

});

require __DIR__ . '/auth.php';
