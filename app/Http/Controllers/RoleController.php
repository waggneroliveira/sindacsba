<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log; 
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {

        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('grupo.visualizar')){
            return view('admin.error.403'); 
        }

        $roles = Role::get();
        $permissions = Permission::get(); 

        return view('admin.blades.group.index', [
            'roles'=>$roles,
            'permissions'=>$permissions
        ]);
    }
    public function store(Request $request)
    {   
        $data = $request->all();

        try {
            DB::beginTransaction();
                $role = Role::create($data);
                $role->syncPermissions($request->permissions);
                Session::flash('success','Grupo cadastrado com sucesso!');
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error','Erro ao criar grupo!');
            return redirect()->back();
        }

    }

    public function update(Request $request,Role $role)
    {
        try{
            DB::beginTransaction();
            $role->update([
                'name'=>$request->name,
            ]);
            $role->syncPermissions($request->permissions);

            DB::commit();
            Session::flash('success','Grupo atualizado com sucesso!');
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            Session::flash('success','Erro ao atualizar!');
            return redirect()->back();
        }
    }

    public function destroy(Request $request,Role $role)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['grupo.visualizar','grupo.remover'])){
            return view('admin.error.403');
        } 

        $role->delete();
        Session::flash('success','Grupo deletado com sucesso!');
        return redirect()->back();
    }
    public function destroySelected(Request $request)
    {

        if (!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar', 'usuario.remover'])) {
            return view('admin.error.403');
        }
    
        foreach ($request->deleteAll as $userId) {
            $user = Role::find($userId);
    
            if ($user) {
                // Log para verificar os dados do usuário
                \Log::info('Dados do grupo antes da exclusão:', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'guard_name' => $user->guard_name,
                ]);
    
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($user)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'guard_name' => $user->guard_name,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Grupo com ID $userId não encontrado.");
            }
        }
    
        $deleted = Role::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' itens deletados com sucesso!']);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }
}
