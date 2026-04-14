<?php

use App\Http\Controllers\EnqueteObedEdomController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/register', function () {
    return redirect()->route('login');
})->name('register');*/


Route::get('/', [InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');

Route::get('/enquete_obed_edom', [EnqueteObedEdomController::class, 'create'])->name('enquete_obed_edom.create');
Route::post('/enquete_obed_edom', [EnqueteObedEdomController::class, 'store'])->name('enquete_obed_edom.store');


Route::get('/enquete_obed_edom_dashboard', [EnqueteObedEdomController::class, 'dashboard'])
    ->name('enquete_obed_edom_dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [InscriptionController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard');

    Route::get('/inscriptions', [InscriptionController::class, 'index'])
        ->name('inscriptions.index');

    Route::get('/inscriptions/{inscription}', [InscriptionController::class, 'show'])
        ->name('inscriptions.show');
});
