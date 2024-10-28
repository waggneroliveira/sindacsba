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
    public function create()
    {   
        if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar','grupo.criar'])) {
            $permissions = Permission::all();
            return view('admin.blades.group.create', [
                'permissions'=>$permissions
            ]);
        }else{
             return view('admin.error.403');
        }         
    }

    public function store(Request $request)
    {   
        $data = $request->all();
        $role = Role::create($data);
        $role->syncPermissions($request->permissions);

        Session::flash('success','Grupo cadastrado com sucesso!');
        return redirect()->route('admin.dashboard.group.index');
    }
    public function edit(Request $request,Role $role)
    {   
        if(Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master') || Auth::user()->can(['grupo.visualizar','grupo.editar'])){
            $permissions = Permission::all();
            return view('admin.blades.group.edit', [
                'role'=>$role,
                'permissions'=>$permissions
            ]);
        }else{
            return view('admin.error.403');
        }         
    }

    public function show(Role $role){
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('grupo.visualizar')){
            return view('admin.error.403');
        } 
        $role = Role::find('id');

        return redirect()->route('admin.dashboard.group.show')->with($role);

    }
    public function update(Request $request,Role $role)
    {
        try{
            DB::beginTransaction();
            $role->update([
                'name'=>$request->name,
            ]);
            $role->syncPermissions($request->permissions);
            // dd($role, $request->permissions);
            DB::commit();
            Session::flash('success','Grupo alterado com sucesso!');
            return redirect()->route('admin.dashboard.group.index');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->withInput();
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
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['grupo.visualizar','grupo.remover'])){
            return view('admin.error.403');
        } 

        if($deleted = Role::whereIn('id', $request->deleteAll)->delete()){
            
            return Response::json(['status' => 'success', 'message' => $deleted.' itens deletados com sucessso!']);
        }

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
