<?php

use App\Models\SettingTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
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
        Route::get('/loading', function () {
            return view('admin.loadPage.loading');
        })->name('loading');


        Route::get('/dashboard', function () {
            Session::forget('just_logged_in');
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
    });

    // LOGOUT
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.dashboard.user.logout');
});

View::composer('admin.core.admin', function ($view) {
    $user = Auth::user();
    
    if ($user) {
        $settingTheme = SettingTheme::where('user_id', $user->id)->first();
    } else {
        $settingTheme = new SettingTheme();
    }
    // dd($settingTheme);
    return $view->with('settingTheme', $settingTheme)->with('user', $user);
});