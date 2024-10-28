<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SettingTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 
use App\Http\Requests\RequestStoreUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Helpers\HelperArchive;

class UserController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/usuario/';

    public function index()
    {
        $users = User::excludeSuper()->with('roles');
        $currentUser = Auth::user();
        if ($currentUser) {
            $settingTheme = SettingTheme::where('user_id', $currentUser->id)->first();
        } else {
            $settingTheme = new SettingTheme();
        }

        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('usuario.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
        // if(Auth::user()->can(['usuario.visualizar','usuario.visualizar outros usuarios'])){
        //     $users = $users->where('id', '<>', 1);
        // }
        // if(Auth::user()->can('usuario.visualizar') && !Auth::user()->can('usuario.visualizar outros usuarios')){
        //     $users = $users->where('id', '<>', 1)
        //         ->where('id', Auth::user()->id);
        // }
        // if (Auth::user()->hasRole('Super') || Auth::user()->can('usuario.tornar usuario master')) {
        //     $users = $users->where('id', '<>', 1);
        // }
        $users = $users->sorting()->get();
        $otherRoles = collect();
        $currentRoles = collect();
        
        $otherRolesBase = Role::where('id', '!=', 1)->get(); 
        
        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $currentRoleIds = Role::join('model_has_roles', 'roles.id', 'model_has_roles.role_id')
                    ->join('users', 'model_has_roles.model_id', 'users.id')
                    ->where('users.id', $user->id)
                    ->pluck('roles.id');
        
                $currentRoles = Role::whereIn('id', $currentRoleIds)->get();
                $otherRoles = $otherRolesBase->whereNotIn('id', $currentRoleIds->toArray());
        
                $user->currentRoles = $currentRoles;
                $user->otherRoles = $otherRoles;
            }
        }
        $permissions = Permission::join('role_has_permissions', 'permissions.id', 'role_has_permissions.permission_id')
        ->groupBy('permissions.name')
        ->select('permissions.name')
        ->get();
        
        return view('admin.blades.user.index', [
            'users'=>$users,
            'otherRoles'=>$otherRoles,
            'permissions'=>$permissions,
            'currentRoles'=>$currentRoles,
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
            
            $userExist = User::where('email', $data['email'])->first();
            
            if ($userExist) {
                Storage::delete($this->pathUpload . $path_image);

                return redirect()->back();
            } else {
                $user = User::create($data);

                if($user){
                    DB::table('setting_themes')->insert([
                        'user_id' => $user->id,
                        'data_bs_theme' => 'dark',
                        'data_layout_width' => 'default',
                        'data_layout_mode' => 'detached',
                        'data_topbar_color' => 'light',
                        'data_menu_color' => 'light',
                        'data_two_column_color' => 'light',
                        'data_menu_icon' => 'default',
                        'data_sidenav_size' => 'condensed',
                        'created_at' => now()
                    ]);                    
                }
                if ($path_image) {
                    $request->file('path_image')->storeAs($this->pathUpload, $path_image);
                }
                DB::commit();
                session()->flash('success', 'Usuário cadastrado com sucesso!');
                return redirect()->route('admin.dashboard.user.index');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Alert::success('error', 'Erro ao cadastrar o Usuário!');
            return redirect()->back();
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

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->except('password');
        $password = Hash::make($request->password);
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
            $data['password'] = $password;
            $data['active'] = $request->active ? 1 : 0;
            if($password == '') unset($data['password']);
            $user->fill($data)->save();
            $user->syncRoles($roles);

            if ($path_image) {Storage::delete($this->pathUpload.$path_image);}
            if ($path_image) {$request->file('path_image')->storeAs($this->pathUpload, $path_image);}
            DB::commit();

            session()->flash('success', 'Usuário atualizado com sucesso!');
            return redirect()->route('admin.dashboard.user.index');
        }catch(\Exception $exception){
            DB::rollBack();
            Alert::success('error', 'Erro ao atualizar o Usuário!');
            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar','usuario.remover'])){
            return view('admin.error.403');
        }
        Storage::delete(isset($user->path_image) ? $user->path_image : '');
        $user->delete();
       
        if(isset($settingTheme)){
            $settingTheme = SettingTheme::find($user->id);
            $settingTheme->delete();
        }
        
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {
        if (!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar', 'usuario.remover'])) {
            return view('admin.error.403');
        }
    
        foreach ($request->deleteAll as $userId) {
            $user = User::find($userId);
    
            if ($user) {
                // Log para verificar os dados do usuário
                \Log::info('Dados do usuário antes da exclusão:', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'active' => $user->active,
                    'sorting' => $user->sorting,
                    'path_image' => $user->path_image,
                ]);
    
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($user)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $userId,
                            'name' => $user->name,
                            'email' => $user->email,
                            'active' => $user->active,
                            'path_image' => $user->path_image,
                            'sorting' => $user->sorting,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Usuário com ID $userId não encontrado.");
            }
        }
    
        $deleted = User::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' itens deletados com sucesso!']);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }
    
    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $user = User::find($id);
    
            if($user) {
                
                // Log para verificar os dados do usuário
                \Log::info('Dados do usuário antes da exclusão:', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'sorting' => $user->sorting,
                ]);

                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($user)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'name' => $user->name,
                            'sorting' => $sorting,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Usuário com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
    
}
