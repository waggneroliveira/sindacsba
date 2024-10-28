<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['active'] = 1;

        if (!Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->active()->first();

            if (!$user) {
                return back()->withErrors([
                    'email' => 'E-mail inválido ou usuário inativo.',
                ]);
            }

            if (!Hash::check($request->password, $user->password)) {
                return back()->withErrors([
                    'password' => 'Senha inválida.',
                ]);
            }
        }

        return redirect()->intended('painel/dashboard');
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/painel/login');
    }


}
