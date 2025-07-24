<?php

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Announcement;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FormIndexController;
use App\Http\Middleware\AuthClientMiddleware;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Auth\AuthClientController;
use App\Http\Controllers\Client\BlogPageController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\ContactPageController;
use App\Http\Controllers\Client\NoticiesPageController;
use App\Http\Controllers\Auth\PasswordEmailClientController;
use App\Http\Controllers\Auth\ResetPasswordClientController;

require __DIR__ . '/dashboard.php';

Route::get('/', function () {
    return redirect()->route('blog');
});

// Route::get('forgot', function () {
//     return view('emails.forgot-password');
// })->name('admin.forgott');

// Route::get('/home', function () {
//     return view('client.blades.index');  
// })->name('index');  
Route::post('login.do', [AuthClientController::class, 'authenticate'])
->name('client.user.authenticate');

// Rota para processar o formulário "Esqueci a senha"
Route::post('/password/email', [PasswordEmailClientController::class, 'passwordEmail'])
->name('client.password.email');

Route::get('/email-enviado-com-sucesso', [PasswordEmailClientController::class, 'showSuccess'])
->name('send-success-client');

// Rota para processar a redefinição de senha
Route::post('/password/reset', [ResetPasswordClientController::class, 'processPasswordReset'])
->name('client-password.update');

// Rota para exibir o formulário de redefinição de senha
Route::get('password/reset/{token}', [ResetPasswordClientController::class, 'showResetForm'])
->name('client.password.reset');


Route::get('/senha-alterada-com-sucesso', function () {
    return view('emails.password-success-client-reset');
})->name('client-success-reset-password');


Route::middleware([AuthClientMiddleware::class])->group(function () {
    Route::put('/client/update', [ClientController::class, 'update'])->name('client.update');

    Route::post('/client/comments', [CommentController::class, 'store'])
    ->name('blog.comment');

    Route::get('logout', [AuthClientController::class, 'logout'])->name('client.user.logout');
});

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

Route::post('cliente/cadastro', [ClientController::class, 'store'])->name('register-client');



View::composer('client.core.client', function ($view) {
    $blogCategories = BlogCategory::whereHas('blogs')
    ->active()
    ->sorting()
    ->limit(6)
    ->get();
    $announcements = Announcement::active()->sorting()->get();
    $contact = Contact::first();

    return $view->with('blogCategories', $blogCategories)
    ->with('announcements', $announcements)
    ->with('contact', $contact);
});
