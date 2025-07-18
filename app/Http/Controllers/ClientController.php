<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        return view('admin.blades.client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'password' => 'required|string|min:8',
            'active' => 'boolean',
        ], [
            'email.unique' => 'O e-mail informado já está sendo utilizado.',
        ]);

        try {
            DB::beginTransaction();

            Client::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'active' => 1,
            ]);

            DB::commit();

            session()->flash('success', 'Cadastro realizado com sucesso!');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Erro no cadastro: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}
