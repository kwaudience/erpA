<?php

namespace App\Http\Controllers\GestUser;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function permissionsIndex() {
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions'));
    }
    public function permissionsStore(Request $request) {
        $request->validate([
            'name' => 'required|unique:permissions|regex:/^[a-z]+\.[a-z]+\.[a-z]+$/',
            'description' => 'nullable'
        ]);
        $permission = Permission::create(['name' => $request->name, 'guard_name' => 'web', 'description' => $request->description]);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'permission_created', 'details' => "Permission {$permission->name} créée"]);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission créée.');
    }

}
