<?php

namespace App\Http\Controllers;

use App\Models\Statute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StatuteController extends Controller
{

    protected $pathUpload = 'admin/uploads/images/statute/';
    public function index()
    {
       $statute = Statute::first();

        return view('admin.blades.statute.index', compact('statute'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_image');

        $request->validate([
            'path_file' => ['nullable', 'file', 'mimes:pdf', 'max:3072'] 
        ]);

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';

            // Salva direto no storage
            Storage::putFileAs($this->pathUpload, $file, $filename);

            $data['path_file'] = $this->pathUpload . $filename;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Statute::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, Statute $statute)
    {
        $data = $request->except('path_file');
        $request->validate([
            'path_file' => ['nullable', 'file', 'mimes:pdf', 'max:3072'] 
        ]);

        // Se veio um novo arquivo
        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';

            // Apaga o arquivo anterior (se existir)
            if (!empty($statute->path_file) && Storage::exists($statute->path_file)) {
                Storage::delete($statute->path_file);
            }

            // Salva o novo PDF
            Storage::putFileAs($this->pathUpload, $file, $filename);

            $data['path_file'] = $this->pathUpload . $filename;
        }

        // Se o usuário pediu para remover via Dropify
        if ($request->has('delete_path_file')) {
            if (!empty($statute->path_file) && Storage::exists($statute->path_file)) {
                Storage::delete($statute->path_file);
            }
            $data['path_file'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $statute->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Statute $statute)
    {
        Storage::delete(isset($statute->path_file)??$statute->path_file);
        $statute->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
