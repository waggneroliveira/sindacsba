<?php

use App\Http\Controllers\Client\HomePageController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormIndexController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('index');
});

// Route::get('/home', function () {
//     return view('client.blades.index');  
// })->name('index');  

Route::get('home', [HomePageController::class, 'index'])->name('index');

// Route::get('/home', [FormIndexController::class, 'index'])->name('index.form');
// Route::post('/enviar-formulario', [FormIndexController::class, 'store']);
