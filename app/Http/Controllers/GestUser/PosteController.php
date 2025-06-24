<?php

namespace App\Http\Controllers\GestUser;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Departement;
use App\Models\Poste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosteController extends Controller
{

    public function postesIndex() {
        $postes = Poste::with('departement')->paginate(10);
        $departments = Departement::all();
        return view('admin.postes.index', compact('postes', 'departments'));
    }
    public function postesStore(Request $request) {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|unique:postes,name,NULL,id,department_id,' . $request->department_id
        ]);
        $poste = Poste::create($request->only('department_id', 'name'));
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'poste_created', 'details' => "Poste {$poste->name} créé"]);
        return redirect()->route('admin.postes.index')->with('success', 'Poste créé.');
    }
}
