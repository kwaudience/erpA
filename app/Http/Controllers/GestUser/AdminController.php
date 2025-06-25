<?php
namespace App\Http\Controllers\GestUser;


use App\Models\Poste;
use App\Models\User;
use App\Models\AuditLog;
use App\Models\Departement;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdminController extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }

    public function usersIndex() {
        $users = User::with('departement', 'poste')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function usersCreate() {
        $departments = Departement::all();
        $postes = Poste::all();
        return view('admin.users.create', compact('departments', 'postes'));
    }
    public function usersStore(Request $request) {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date|before:today',
            'address' => 'required|max:500',
            'phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'departement_id' => 'required|exists:departements,id',
            'poste_id' => 'required|exists:postes,id',
            'contract_type' => 'required|in:CDI,CDD,Intérim',
            'hire_date' => 'required|date|after:1900-01-01',
            'role' => 'required|exists:roles,name',
            'social_security_number' => 'required|regex:/^\d{15}$/',
            'rib' => 'required|regex:/^[A-Z]{2}\d{2}[A-Z0-9]{4}\d{7}([A-Z0-9]?){0,16}$/',
            'documents.*' => 'nullable|file|mimes:pdf,jpg,png|max:10240',
            'status' => 'required|in:Actif,Inactif,En congé'
        ]);

        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('documents', 'documents');
                $documents[] = ['name' => $file->getClientOriginalName(), 'path' => $path];
            }
        }

        $user = User::create(array_merge($request->except('documents', 'password', 'access_level'), [
            'password' => Hash::make($request->password),
            'tenant_id' => 1,
            'documents' => $documents,
        ]));

        $user->assignRole($request->access_level);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'user_created', 'details' => "Utilisateur {$user->email} créé"]);
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé.');
    }
    public function usersPermissions(User $user) {
        $permissions = Permission::all();
        $assignedPermissions = $user->permissions()->pluck('id')->toArray();
        $restrictedPermissions = $user->restrictions()->pluck('id')->toArray();
        return view('admin.users.permissions', compact('user', 'permissions', 'assignedPermissions', 'restrictedPermissions'));
    }
    public function usersPermissionsRestrict(Request $request, User $user) {
        $request->validate([
            'permission_id' => 'required|exists:permissions,id',
            'expiration_date' => 'nullable|date|after:today'
        ]);
        $user->restrictions()->attach($request->permission_id, ['expiration_date' => $request->expiration_date]);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'permission_restricted', 'details' => "Permission {$request->permission_id} restreinte pour {$user->email}"]);
        return redirect()->route('admin.users.permissions', $user)->with('success', 'Permission restreinte.');
    }
    public function usersAssignPermission(Request $request, User $user) {
        $request->validate([
            'permission_id' => 'required|exists:permissions,id',
            'expiration_date' => 'nullable|date|after:today'
        ]);
        $user->givePermissionTo($request->permission_id);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'permission_assigned', 'details' => "Permission {$request->permission_id} attribuée à {$user->email}"]);
        return redirect()->route('admin.users.permissions', $user)->with('success', 'Permission attribuée.');
    }
}
