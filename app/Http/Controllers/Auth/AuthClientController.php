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

        if (!Auth::attempt($credentials)) {
            $client = Client::where('email', $request->email)->active()->first();

            if (!$client) {
                return back()->withErrors([
                    'email' => 'E-mail inválido ou usuário inativo.',
                ]);
            }

            if (!Hash::check($request->password, $client->password)) {
                return back()->withErrors([
                    'password' => 'Senha inválida.',
                ]);
            }
        }

        $clientAuthenticate = Auth::user();
        $client = Client::find($clientAuthenticate->id);

        activity()
            ->causedBy(Auth::client())
            ->performedOn($client)
            ->event('login')
            ->withProperties([
                'attributes' => [
                    'id' => $clientAuthenticate->id,
                    'name' => $clientAuthenticate->name,
                    'email' => $clientAuthenticate->email,
                    'active' => $clientAuthenticate->active,
                    // 'path_image' => $clientAuthenticate->path_image,
                    'remember_token' => $clientAuthenticate->remember_token,
                    'email_verified_at' => $clientAuthenticate->email_verified_at,
                    'event' => 'login',
                ]
            ])
            ->log('login');
          
        session()->flash('success', 'Login realizado com sucesso!');

        return redirect()->intended('painel/dashboard');
    }


    public function logout(Request $request)
    {
        $clientAuthenticate = Auth::client(); 
        $client = client::select('id','name','email')->find($clientAuthenticate->id);
        
        activity()
            ->causedBy($clientAuthenticate)
            ->performedOn($client)
            ->event('logout')
            ->withProperties([
                'attributes' => [
                    'id' => $clientAuthenticate->id,
                    'name' => $clientAuthenticate->name,
                    'email' => $clientAuthenticate->email,
                    'event' => 'logout',
                ]
            ])
            ->log('logout');
            
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Logout realizado com sucesso!');
        return redirect('/noticias');
    }
}
