<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class PasswordEmailController extends Controller
{
    public function passwordEmail(Request $request)
    {
        $validatedData = $request->validate(['email' => 'required|email']);
        $email = $validatedData['email'];
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        Session::flash('success', 'Por favor, verifique o seu e-mail para prosseguir com o processo de redefinição de senha.');
    
        return $status === Password::RESET_LINK_SENT
                    ? redirect()->route('send-success')->with(['status' => __($status), 'email' => $email])
                    : back()->withErrors(['email' => __($status)]);
    }
    
    public function showSuccess(Request $request)
    {
        $email = $request->session()->get('email');
    
        return view('emails.send-success', compact('email'));
    }

}
