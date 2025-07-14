<?php

namespace App\Http\Controllers;

use App\Models\Noticies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NoticiesController extends Controller
{
    protected $pathUpload = 'admin/uploads/files/noticies/';
    public function index()
    {
        $noticies = Noticies::sorting()->get();

        return view('admin.blades.noticies.index', compact('noticies'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;


        try {
            DB::beginTransaction();
                Noticies::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, Noticies $noticies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticies $noticies)
    {
        //
    }
}
