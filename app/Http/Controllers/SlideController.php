<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::get();
        return view('admin.blades.slide.index', compact('slides'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        //
    }

    public function destroySelected(Request $request)
    {
        if (!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar', 'usuario.remover'])) {
            return view('admin.error.403');
        }
    
        foreach ($request->deleteAll as $slideId) {
            $slide = Slide::find($slideId);
    
            if ($slide) {
                // Log para verificar os dados do usuário
                \Log::info('Dados do usuário antes da exclusão:', [
                    'id' => $slide->id,
                    'name' => $slide->name,
                    'email' => $slide->email,
                    'active' => $slide->active,
                    'sorting' => $slide->sorting,
                    'path_image' => $slide->path_image,
                ]);
    
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $slideId,
                            'name' => $slide->name,
                            'email' => $slide->email,
                            'active' => $slide->active,
                            'path_image' => $slide->path_image,
                            'sorting' => $slide->sorting,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $slideId não encontrado.");
            }
        }
    
        $deleted = Slide::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }
    
    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $slide = Slide::find($id);
    
            if($slide) {
                
                // Log para verificar os dados do usuário
                \Log::info('Dados do usuário antes da exclusão:', [
                    'id' => $slide->id,
                    'name' => $slide->name,
                    'sorting' => $slide->sorting,
                ]);

                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($slide)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'name' => $slide->name,
                            'sorting' => $sorting,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
