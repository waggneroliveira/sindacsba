<?php

namespace App\Http\Controllers;

use App\Models\SettingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SettingEmailController extends Controller
{
    public function index()
    {
        $settingEmail = SettingEmail::first();

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
        // dd($data);
        try {
            DB::beginTransaction();
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
}
