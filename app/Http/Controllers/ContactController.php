<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;

class ContactController extends Controller
{

    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
          !Auth::user()->can('usuario.tornar usuario master') &&
          !Auth::user()->hasPermissionTo('contato.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
        $contact = Contact::first();
        return view('admin.blades.contact.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $data = $request->all();


        $validated = $request->validate([
            'name' => 'required|name',
            'email' => 'required|email',
            'phone' => 'required|phone',
            'subject' => 'required|subject',
            'text' => 'required|text',
            'term_privacy' => 'accepted',
        ]);

        try {
            DB::beginTransaction();

            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'text' => $validated['text'],
                'term_privacy' => 1,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Cadastro realizado com sucesso!',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => true,
                'message' => 'Ocorreu um erro ao cadastrar. Por favor, tente novamente.',
                'details' => $e->getMessage()
            ], 500);
        }

        // try {
        //     DB::beginTransaction();
        //         Contact::create($data);
        //     DB::commit();
        //     session()->flash('success', __('dashboard.response_item_create'));
        //     return redirect()->back();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     Alert::error('Erro', __('dashboard.response_item_error_create'));
        //     return redirect()->back();
        // }
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();
                $contact->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }


    public function destroy(Contact $contact)
    {
        $contact->delete();
        session()->flash('success', __('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
