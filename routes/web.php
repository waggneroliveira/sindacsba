<?php

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Announcement;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormIndexController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\ContactPageController;
use App\Http\Controllers\Client\NoticiesPageController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('blog');
});

// Route::get('/home', function () {
//     return view('client.blades.index');  
// })->name('index');  


Route::get('contato', [ContactPageController::class, 'index'])
->name('contact');
Route::post('send-contact', [FormIndexController::class, 'store'])->name('send-contact');
Route::get('editais', [NoticiesPageController::class, 'index'])
->name('noticies');
Route::get('noticias/interna/{slug}', [BlogPageController::class, 'blogInner'])
->name('blog-inner');
Route::get('noticias/{category?}', [BlogPageController::class, 'index'])->name('blog');
Route::post('noticias/search', [BlogPageController::class, 'index'])->name('blog-search');
Route::post('send-newsletter', [NewsletterController::class, 'store'])->name('send-newsletter');



View::composer('client.core.client', function ($view) {
    $blogCategories = BlogCategory::whereHas('blogs')
    ->active()
    ->sorting()
    ->get();
    $announcements = Announcement::active()->sorting()->get();
    $contact = Contact::first();

    return $view->with('blogCategories', $blogCategories)
    ->with('announcements', $announcements)
    ->with('contact', $contact);
});
