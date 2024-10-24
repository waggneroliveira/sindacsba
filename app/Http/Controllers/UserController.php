<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestStoreUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;
use Illuminate\Console\View\Components\Alert;
use App\Http\Controllers\Helpers\HelperArchive;

class UserController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/usuario/';

    public function index()
    {
        $users = User::query();
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('usuario.visualizar')){
            return view('admin.error.403');
        }
        if(Auth::user()->can(['usuario.visualizar','usuario.visualizar outros usuarios'])){
            $users = $users->where('id', '<>', 1);
        }
        if(Auth::user()->can('usuario.visualizar') && !Auth::user()->can('usuario.visualizar outros usuarios')){
            $users = $users->where('id', '<>', 1)
                ->where('id', Auth::user()->id);
        }
        if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master')) {
            $users = $users->where('id', '<>', 1);
        }
        $users = $users->sorting()->get();
        $otherRoles = '';

        foreach ($users as $user) {
            $currentRoleIds = Role::join('model_has_roles', 'roles.id', 'model_has_roles.role_id')
                ->join('users', 'model_has_roles.model_id', 'users.id')
                ->where('users.id', $user->id)
                ->pluck('roles.id');
        
            $currentRoles = Role::whereIn('id', $currentRoleIds)->get();
            if ($currentRoleIds) {
                $otherRoles = Role::whereNotIn('id', $currentRoleIds)->get();
            }            
        
            $user->currentRoles = $currentRoles;
            $user->otherRoles = $otherRoles;
        }
        
        $permissions = Permission::join('role_has_permissions', 'permissions.id', 'role_has_permissions.permission_id')
        ->groupBy('permissions.name')
        ->select('permissions.name')
        ->get();

        return view('admin.blades.user.index', [
            'users'=>$users,
            'otherRoles'=>$otherRoles,
            'permissions'=>$permissions,
        ]);
    }

    public function store(RequestStoreUser $request)
    {
        $data = $request->all();
        $helper = new HelperArchive();

        try {
            DB::beginTransaction();

            $path_image = $helper->renameArchiveUpload($request, 'path_image');
            if ($path_image) {
                $data['path_image'] = $this->pathUpload . $path_image;
            }
            $data['password'] = Hash::make($request->password);
            $data['active'] = $request->active ? 1 : 0;
            $data['email_verified_at'] = now();

            $userExist = User::where('email', $data['email'])->first();

            if ($userExist) {
                Storage::delete($this->pathUpload . $path_image);

                return redirect()->back()->with('error', 'Erro ao cadastrar Usuário! Este e-mail já existe em nossos registros.');
            } else {
                User::create($data);

                if ($path_image) {
                    $request->file('path_image')->storeAs($this->pathUpload, $path_image);
                }
                DB::commit();
                Alert::success('success', 'Mensagem de sucesso!');
                // Session::flash('success', 'Usuário cadastrado com sucesso!');
                return redirect()->route('admin.dashboard.user.index');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar o Usuário: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar','usuario.editar'])){
            return view('admin.error.403');
        }


        return view('admin.cruds.user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $helper = new HelperArchive();
        $roles = $request->input('roles', []);

        if (Auth::user()->hasRole('Super') && $user->id == 1) {
            $roles[] = 'Super';
        }

        try {
            DB::beginTransaction();
            $path_image = $helper->renameArchiveUpload($request, 'path_image');
            if ($path_image) $data['path_image'] = $this->pathUpload . $path_image;
            if ($path_image) {
                Storage::delete($user->path_image);
                $request->file('path_image')->storeAs($this->pathUpload, $path_image);
            }
            if(isset($request->delete_path_image) && !$path_image){
                $inputFile = $request->delete_path_image;
                Storage::delete($user->$inputFile);
                $data['path_image'] = null;
            }

            $data['password'] = Hash::make($request->password);
            $data['active'] = $request->active ? 1 : 0;
            if($request->password == '') unset($data['password']);
            $user->fill($data)->save();
            $user->syncRoles($roles);

            if ($path_image) {Storage::delete($this->pathUpload.$path_image);}
            if ($path_image) {$request->file('path_image')->storeAs($this->pathUpload, $path_image);}
            DB::commit();
            Session::flash('success', 'Usuário atualizado com sucesso!');
            return redirect()->route('admin.dashboard.user.index');
        }catch(\Exception $exception){
            DB::rollBack();
            Session::flash('error', 'Erro ao atualizar o Usuário!');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['message-error'=>$exception->getMessage()]);
        }
    }

    public function destroy(User $user)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar','usuario.remover'])){
            return view('admin.error.403');
        }
        Storage::delete(isset($user->path_image) ? $user->path_image : '');
        $user->delete();

        Session::flash('success','Usuário deletado com sucesso!');
        return redirect()->back();
    }
    public function destroySelected(Request $request)
    {
        if (!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar','usuario.remover'])) {
            return view('admin.error.403');
        }

        if($deleted = User::whereIn('id', $request->deleteAll)->delete()){
            return Response::json(['status' => 'success', 'message' => $deleted.' itens deletados com sucessso!']);
        }
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id){
            User::where('id', $id)->update(['sorting' => $sorting]);
        }
        return Response::json(['status' => 'success']);
    }
}
