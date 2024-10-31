<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SettingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class SettingEmailController extends Controller
{
    public function index()
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('email.visualizar')){
            return view('admin.error.403'); 
        }

        $settingEmail = SettingEmail::first();
        unset($settingEmail->mail_password);

        return view('admin.blades.seetingEmail.form', compact('settingEmail'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        try {
            DB::beginTransaction();
                $email =SettingEmail::create($data);
                // dd($email);
                Session::flash('success', 'Configuração cadastrada com sucesso!');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            // dd($e);
            DB::rollback();
                Session::flash('error', 'Erro ao cadastrar configuração!');
                return redirect()->back();
        }
    }

    public function update(Request $request, SettingEmail $settingEmail)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();
                if ($request->filled('mail_password')) {
                    $data['mail_password'] = $request->mail_password;
                } else {
                    unset($data['mail_password']);
                }
                $settingEmail->fill($data)->save();
                Session::flash('success', 'Configuração atualizada com sucesso!');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
                Session::flash('error', 'Erro ao atualizar configuração!');
                return redirect()->back();
        }
    }

    public function destroy(SettingEmail $settingEmail)
    {
        $settingEmail->delete();
        Session::flash('success', 'Configuração deletada com sucesso!');
        return redirect()->back();
    }

    public function smtpVerify()
    {
        try {
            $user = Auth::user();
            $emailSettings = SettingEmail::first();

            // Atualizando as configurações do Mail
            Config::set([
                'mail.default' => isset($emailSettings) ? $emailSettings->mail_mailer : 'smtp',
                'mail.mailers.smtp.transport' => isset($emailSettings) ? $emailSettings->mail_mailer : 'smtp',
                'mail.mailers.smtp.host' => isset($emailSettings) ? $emailSettings->mail_host : 'smtp.gmail.com',
                'mail.mailers.smtp.port' => isset($emailSettings) ? $emailSettings->mail_port : 465,
                'mail.mailers.smtp.encryption' => isset($emailSettings) ? $emailSettings->mail_encryption : 'ssl',
                'mail.mailers.smtp.username' => isset($emailSettings) ? $emailSettings->mail_username : 'waggner.447@gmail.com',
                'mail.mailers.smtp.password' => isset($emailSettings) ? $emailSettings->mail_password : 'aggd cvvg ljkp gxli',
                'mail.from.address' => isset($emailSettings) ? $emailSettings->mail_from_address : 'waggner.447@gmail.com',
                'mail.from.name' => isset($emailSettings) ? $emailSettings->mail_from_name : 'WHI - Web de Alta inspiração',
            ]);

            // Enviando o e-mail de teste
            $teste = Mail::raw('Olá, Este e-mail é um teste automático para validar a conexão do seu site com o servidor SMTP. Caso tenha recebido esta mensagem, a conexão foi estabelecida com sucesso. Se não foi você quem solicitou este teste, ignore este e-mail.', function($msg) use ($emailSettings) {
                $msg->to('waggner.dev@gmail.com')
                    ->subject('Teste de conexão SMTP')
                    ->from(isset($emailSettings)?$emailSettings->mail_username:'waggner.447@gmail.com', 'WHI - Web de Alta Inspiração');
            });

            if($teste){
                activity()
                ->causedBy($user)
                ->performedOn($emailSettings)
                ->event('multiple_deleted')
                ->withProperties([
                    'attributes' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'active' => $user->active,
                        'event' => 'test_conection_smtp',
                    ]
                ])
                ->log('test_conection_smtp');
            }

            return Response::json(['status'=> 'success', 'message' => 'Teste de SMTP realizado com sucesso']);
        } catch (Exception $e) {
            return Response::json([
                'status'=> 'error',
                'message' => 'Não foi possível realizar o teste, verifique se todas as informações estão corretas',
                'details' => $e->getMessage()
            ]);
        }
    }
}
