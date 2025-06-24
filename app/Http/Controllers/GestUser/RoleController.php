<?php

namespace App\Http\Controllers\GestUser;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function rolesIndex() {
        $roles = Role::with('permissions')->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }
    public function rolesStore(Request $request) {
        $request->validate(['name' => 'required|unique:roles']);
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'role_created', 'details' => "Rôle {$role->name} créé"]);
        return redirect()->route('admin.roles.index')->with('success', 'Rôle créé.');
    }
    public function rolesPermissions(Role $role) {
        $permissions = Permission::all();
        $assignedPermissions = $role->permissions()->pluck('id')->toArray();
        return view('admin.roles.permissions', compact('role', 'permissions', 'assignedPermissions'));
    }
    public function rolesPermissionsStore(Request $request, Role $role) {
        $request->validate([
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id'
        ]);
        $role->syncPermissions($request->permission_ids);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'permission_assigned_to_role', 'details' => "Permissions ajoutées au rôle {$role->name}"]);
        return redirect()->route('admin.roles.index')->with('success', 'Permissions ajoutées.');
    }
    public function rolesDestroy(Role $role) {
        $name = $role->name;
        User::whereHas('roles', function ($query) use ($role) {
            $query->where('id', $role->id);
        })->each(function ($user) use ($role) {
            $user->removeRole($role);
        });
        $role->delete();
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'role_deleted', 'details' => "Rôle {$name} supprimé"]);
        return redirect()->route('admin.roles.index')->with('success', 'Rôle supprimé.');
    }
}
