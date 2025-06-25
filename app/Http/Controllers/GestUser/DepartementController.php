<?php

namespace App\Http\Controllers\GestUser;

use App\Models\AuditLog;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DepartementController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        $this->middleware(['auth', 'role:admin']);
    }
     public function departmentsIndex() {
        $departments = Departement::paginate(10);
        return view('admin.departements.index', compact('departments'));
    }
     public function departmentsCreate() {
        return view('admin.departements.index');
    }
     public function departmentsEdit() {
        $departments = Departement::where(10);
        return view('admin.departements.index', compact('departments'));
    }
    public function departmentsStore(Request $request) {
        $request->validate([
            'name' => 'required|unique:departments'
        ]);
        $departement = Departement::create($request->only('name'));
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'department_created',
            'details' => "Département {$departement->name} créé"
        ]);
        return redirect()->route('admin.departements.index')->with('success', 'Département créé.');
    }
    public function departmentsDestroy(Departement $departement) {
        $name = $departement->name;
        $departement->delete();
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'department_deleted', 'details' => "Département {$name} supprimé"]);
        return redirect()->route('admin.departements.index')->with('success', 'Département supprimé.');
    }
}
