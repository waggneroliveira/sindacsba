<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\FormIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormIndexController extends Controller
{

    public function index()
    {
        return Inertia::render('App', [
            'sessionMessage' => session('message')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();            
                FormIndex::create($request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    'gender' => 'required|string',
                    'description' => 'nullable|string',
                    'password' => 'required|string|min:8',
                ]));
            DB::commit();

            return to_route('index.form');

        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FormIndex $formIndex)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormIndex $formIndex)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormIndex $formIndex)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormIndex $formIndex)
    {
        //
    }
}
