<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['active'] = 1;

        // Tenta autenticar
        if (!Auth::guard('client')->attempt($credentials)) {
            $client = Client::where('email', $request->email)->first();

            if (!$client || !$client->active) {
                return back()->withErrors([
                    'email' => 'E-mail inválido ou usuário inativo.',
                ])->withInput();
            }

            if (!Hash::check($request->password, $client->password)) {
                return back()->withErrors([
                    'password' => 'Senha inválida.',
                ])->withInput();
            }
        }

        $client = Auth::guard('client')->user();

        // Log de atividade
        activity()
            ->causedBy($client)
            ->performedOn($client)
            ->event('login')
            ->withProperties([
                'attributes' => [
                    'id' => $client->id,
                    'name' => $client->name,
                    'email' => $client->email,
                    'active' => $client->active,
                    'remember_token' => $client->remember_token,
                    'email_verified_at' => $client->email_verified_at,
                    'event' => 'login',
                ]
            ])
            ->log('login');

        session()->flash('success', 'Login realizado com sucesso!');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        $client = Auth::guard('client')->user();

        if ($client) {
            activity()
                ->causedBy($client)
                ->performedOn($client)
                ->event('logout')
                ->withProperties([
                    'attributes' => [
                        'id' => $client->id,
                        'name' => $client->name,
                        'email' => $client->email,
                        'event' => 'logout',
                    ]
                ])
                ->log('logout');

            Auth::guard('client')->logout();
        }

        session()->flash('success', 'Logout realizado com sucesso!');
        return redirect()->back();
    }

}
