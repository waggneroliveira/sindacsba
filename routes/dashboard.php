<?php

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StackController;
use App\Repositories\AuditCountRepository;
use App\Http\Controllers\ProjectController;
use App\Repositories\SettingThemeRepository;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\SettingEmailController;
use App\Http\Controllers\SettingThemeController;
use App\Http\Controllers\AuditActivityController;
use App\Http\Controllers\StackSessionTitleController;
use App\Http\Controllers\Auth\PasswordEmailController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('painel/', function () {
    return redirect()->route('admin.dashboard.painel');
});

Route::prefix('painel/')->group(function () {
    Route::get('login', function () {
        return view('admin.auth.login');
    })->name('admin.dashboard.painel');

    Route::get('/success-logout', function () {
        return view('admin.success.success-logout');
    })->name('success-logout');

    Route::post('login.do', [AuthController::class, 'authenticate'])
    ->name('admin.user.authenticate');

    /*=====================REDEFINICAO DE SENHA=========================*/

    // Rota para exibir o formulário "Esqueci a senha"
    Route::get('password/reset', function(){
        return view('admin.auth.recover-password');
    })->name('password.request');

    // Rota para processar o formulário "Esqueci a senha"
    Route::post('/password/email', [PasswordEmailController::class, 'passwordEmail'])
    ->name('password.email');

    // Rota para exibir o formulário de redefinição de senha
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
    
    // Rota para processar a redefinição de senha
    Route::post('/password/reset', [ResetPasswordController::class, 'processPasswordReset'])
    ->name('password.update');
    
    Route::get('/send-success', [PasswordEmailController::class, 'showSuccess'])
    ->name('send-success');

    Route::get('/password-success-reset', function () {
        return view('emails.password-success-reset');
    })->name('success-reset-password');

    /*=====================FINAL REDEFINICAO DE SENHA=========================*/

    Route::middleware([Authenticate::class])->group(function(){ 
        Route::get('documentation', function () {
            return view('admin.documentation.introduction');
        })->name('admin.dashboard.documentation.introduction');

        Route::get('/loading', function () {
            return view('admin.loadPage.loading');
        })->name('loading');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        //AUDITORIA
        Route::resource('auditorias', AuditActivityController::class)
        ->names('admin.dashboard.audit')
        ->parameters(['auditorias'=>'activitie']);
        Route::post('auditorias/{id}/mark-as-read', [AuditActivityController::class, 'markAsRead']);
        Route::post('/auditorias/mark-all-as-read', [AuditActivityController::class, 'markAllAsRead']);
        //CATEGORIA BLOG
        Route::resource('categoria-do-blog', BlogCategoryController::class)
        ->parameters(['categoria-do-blog' => 'blogCategory'])
        ->names('admin.dashboard.blogCategory');
        Route::post('categoria-do-blog/delete', [BlogCategoryController::class, 'destroySelected'])
        ->name('admin.dashboard.blogCategory.destroySelected');
        Route::post('categoria-do-blog/sorting', [BlogCategoryController::class, 'sorting'])
        ->name('admin.dashboard.blogCategory.sorting');
        //SLIDES
        Route::resource('slides', SlideController::class)
        ->names('admin.dashboard.slide')
        ->parameters(['slides'=>'slide']);
        Route::post('slides/delete', [SlideController::class, 'destroySelected'])
        ->name('admin.dashboard.slide.destroySelected');
        Route::post('slides/sorting', [SlideController::class, 'sorting'])
        ->name('admin.dashboard.slide.sorting');
        //PROJECTS
        Route::resource('projeto', ProjectController::class)
        ->names('admin.dashboard.project')
        ->parameters(['projeto'=>'project']);
        //STACKS
        Route::resource('stacks', StackController::class)
        ->names('admin.dashboard.stack')
        ->parameters(['stacks'=>'stack']);
        Route::post('stacks/delete', [StackController::class, 'destroySelected'])
        ->name('admin.dashboard.stack.destroySelected');
        Route::post('stacks/sorting', [StackController::class, 'sorting'])
        ->name('admin.dashboard.stack.sorting');
        //STACKSESSIONTITLE
        Route::resource('titulo-da-sessao', StackSessionTitleController::class)
        ->names('admin.dashboard.stackSessionTitle')
        ->parameters(['titulo-da-sessao'=>'stackSessionTitle']);
        //E-MAIL CONFIG
        Route::resource('configuracao-de-email', SettingEmailController::class)
        ->names('admin.dashboard.settingEmail')
        ->parameters(['configuracao-de-email' => 'settingEmail']);
        Route::post('configuracoes/smtp/verify', [SettingEmailController::class, 'smtpVerify'])->name('admin.dashboard.settingEmail.smtpVerify');
        //GRUPOS
        Route::resource('grupos', RoleController::class)
        ->names('admin.dashboard.group')
        ->parameters(['grupos' => 'role']);
        Route::post('grupos/delete', [RoleController::class, 'destroySelected'])
        ->name('admin.dashboard.group.destroySelected');
        //USUARIOS
        Route::resource('usuario', UserController::class)
        ->names('admin.dashboard.user')
        ->parameters(['usuario'=>'user']);
        Route::post('usuario/delete', [UserController::class, 'destroySelected'])
        ->name('admin.dashboard.user.destroySelected');
        Route::post('usuario/sorting', [UserController::class, 'sorting'])
        ->name('admin.dashboard.user.sorting');
        
        // SETTINGS THEME
        Route::post('setting', [SettingThemeController::class, 'setting'])->name('admin.dashboard.settingTheme'); 
        Route::post('setting/update', [SettingThemeController::class, 'settingUpdate'])->name('admin.dashboard.settingThemeUpdate'); 
    });

    // LANGUAGES
    Route::get('/lang/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'es', 'pt'])) {
            abort(400);
        }
        session(['locale' => $locale]);
        App::setLocale($locale);

        return redirect()->back();
    })->name('change.language');
    // LOGOUT
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.dashboard.user.logout');
});

View::composer('admin.core.admin', function ($view) {
    $currentUser = Auth::user();
    $user = User::where('id', $currentUser->id)->active()->first();
    
    $notifications = (new AuditCountRepository());
    $auditorias = $notifications->allAudit();
    $auditCount = $notifications->auditCount();
    $settingTheme = (new SettingThemeRepository())->settingTheme();

    return $view->with('settingTheme', $settingTheme)->with('user', $user)->with('auditorias', $auditorias)->with('auditCount', $auditCount);
});
