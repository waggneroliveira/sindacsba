<?php

use Inertia\Inertia;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormIndexController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\HomePageController;

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

// Route::get('/blog', function () {
//     return view('client.blades.blog');  
// })->name('index'); 

Route::get('/blog/interna', function () {
    return view('client.blades.blog-inner');  
})->name('blog-inner'); 

Route::get('blog', [BlogPageController::class, 'index'])->name('index');

// Route::get('home', [HomePageController::class, 'index'])->name('index');

// Route::get('/home', [FormIndexController::class, 'index'])->name('index.form');
// Route::post('/enviar-formulario', [FormIndexController::class, 'store']);

View::composer('client.core.client', function ($view) {
    $blogCategories = BlogCategory::whereHas('blogs')
    ->active()
    ->sorting()
    ->get();

    return $view->with('blogCategories', $blogCategories);
});
