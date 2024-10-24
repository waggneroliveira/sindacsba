<?php

use App\Models\SettingTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SettingThemeController;

Route::get('painel/', function () {
    return redirect()->route('admin.dashboard.painel');
});

Route::prefix('painel/')->group(function () {
    Route::get('login', function () {
        return view('admin.auth.login');
    })->name('admin.dashboard.painel');

    Route::post('login.do', [AuthController::class, 'authenticate'])
    ->name('admin.user.authenticate');

    Route::middleware([Authenticate::class])->group(function(){ 
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

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
        Route::post('settingUpdate', [SettingThemeController::class, 'settingupdate'])->name('admin.dashboard.settingTheme');
    });

    // LOGOUT
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.dashboard.user.logout');
});

View::composer('admin.core.admin', function ($view) {
    $settingTheme = SettingTheme::where('user_id', Auth::user()->id)->first();

    return $view->with('settingTheme', $settingTheme);
});