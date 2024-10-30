<?php

namespace App\Http\Controllers\Auth;

use App\Models\SettingEmail;
use Illuminate\Http\Request;
use App\Services\EmailService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;

class PasswordEmailController extends Controller
{
    public function passwordEmail(Request $request)
    {
        try {
            $validatedData = $request->validate(['email' => 'required|email']);
            $email = $validatedData['email'];

            $emailSettings = SettingEmail::first(); 
            $emailService = new EmailService();
            $emailService->configureAndSend($emailSettings, $request->only('email'));

            $status = Password::sendResetLink($request->only('email'));
  
            if (Password::RESET_LINK_SENT) {
                return redirect()->route('send-success')->with(['status' => __($status), 'email' => $email]);
            } else {
                return back()->withErrors(['email' => 'Por favor, aguarde antes de tentar novamente.']);
            }

        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Erro ao enviar o link de redefinição de senha. Por favor, verifique as configurações SMTP no painel de gerenciamento e tente novamente']);
        }
    }

    public function showSuccess(Request $request)
    {
        $email = $request->session()->get('email');
    
        return view('emails.send-success', compact('email'));
    }

}
