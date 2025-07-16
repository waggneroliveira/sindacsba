<?php

use Inertia\Inertia;
use App\Models\Announcement;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormIndexController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\NoticiesPageController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('blog');
});

// Route::get('/home', function () {
//     return view('client.blades.index');  
// })->name('index');  

Route::get('/contato', function () {
    return view('client.blades.contact');  
})->name('contact');

Route::get('editais', [NoticiesPageController::class, 'index'])
->name('noticies');
Route::get('noticias/interna/{slug}', [BlogPageController::class, 'blogInner'])
->name('blog-inner');
Route::get('noticias/{category?}', [BlogPageController::class, 'index'])->name('blog');
Route::post('noticias/search', [BlogPageController::class, 'index'])->name('blog-search');
Route::post('send-newsletter', [NewsletterController::class, 'store'])->name('send-newsletter');


// Route::get('home', [HomePageController::class, 'index'])->name('index');

View::composer('client.core.client', function ($view) {
    $blogCategories = BlogCategory::whereHas('blogs')
    ->active()
    ->sorting()
    ->get();
    $announcements = Announcement::active()->sorting()->get();

    return $view->with('blogCategories', $blogCategories)
    ->with('announcements', $announcements);
});
