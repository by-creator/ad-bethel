<?php

use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [InscriptionController::class, 'create'])->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
/*
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');*/

    Route::get('/dashboard', [InscriptionController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


    Route::get('/inscriptions', [InscriptionController::class, 'index'])
        ->name('inscriptions.index');

    Route::get('/inscriptions/{inscription}', [InscriptionController::class, 'show'])
        ->name('inscriptions.show');
});
