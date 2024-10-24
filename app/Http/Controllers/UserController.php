<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

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

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
