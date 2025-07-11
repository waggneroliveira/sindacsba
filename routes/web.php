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

Route::get('/contato', function () {
    return view('client.blades.contact');  
})->name('contact');

Route::get('/editais', function () {
    return view('client.blades.notices');  
})->name('noticies');

Route::get('/blog', function () {
    return view('client.blades.blog');  
})->name('blog'); 

Route::get('/blog/interna', function () {
    return view('client.blades.blog-inner');  
})->name('blog-inner'); 

Route::get('home', [HomePageController::class, 'index'])->name('index');

// Route::get('/home', [FormIndexController::class, 'index'])->name('index.form');
// Route::post('/enviar-formulario', [FormIndexController::class, 'store']);
