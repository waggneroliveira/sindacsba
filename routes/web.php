<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormIndexController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('index.form');
});

Route::get('/home', [FormIndexController::class, 'index'])->name('index.form');
Route::post('/enviar-formulario', [FormIndexController::class, 'store']);
