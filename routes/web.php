<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewParcelController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ParcelDetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
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

Route::get('/check', function () {

    $username = config('services.sms.username');
    $password = config('services.sms.password');
    $url      = config('services.sms.url');
    $code     = config('services.sms.code');

    $payload = [
        'IsClientLogin'    => 'N',
        'UserName'         => $username,
        'Password'         => $password,
        'OrganisationCode' => $code,
        'Message'          => 'Sorry, your application was not selected!',
        'ReceiverNo'       => '9840465291',
    ];

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_POST           => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
        CURLOPT_USERPWD        => "{$username}:{$password}",
        CURLOPT_HTTPHEADER     => [
            'OrganisationCode: DirectWayUser',
            'Content-Type: application/json',
            'Accept: application/json',
        ],
    ]);


    $response = curl_exec($ch);
    $error    = curl_error($ch);
    $errno    = curl_errno($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($errno) {
        dd([
            'success' => false,
            'error'   => $error,
        ]);
    }

    dd([
        'http_code' => $httpCode,
        'response'  => json_decode($response, true) ?? $response,
    ]);
});

require __DIR__ . '/auth.php';
