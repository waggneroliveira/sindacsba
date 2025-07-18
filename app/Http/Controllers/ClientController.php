<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ClientController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/perfil/';
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
        $client = auth('client')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'password' => 'nullable|string|min:8',
            'path_image' => ['nullable', 'file', 'image', 'max:2048'],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); 
        }

        $manager = new ImageManager(GdDriver::class);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($client->path_image) {
                $oldPath = str_replace('storage/', '', $client->path_image);
                Storage::disk('public')->delete($oldPath);
            }

            if ($mime === 'image/svg+xml') {
                $file->storeAs($this->pathUpload, $filename, 'public');
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::disk('public')->put($this->pathUpload . $filename, $image);
            }

            $validated['path_image'] = 'storage/' . $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($client->path_image)??$client->path_image);
            $data['path_image'] = null;
        }

        $client->update($validated);

        return back()->with('success', 'Dados atualizados com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Storage::delete(isset($client->path_image)??$client->path_image);
        $client->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
