<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//departements
Route::get('/ajouter_departement', function () {
    return view('departements.ajouter');
})->name('ajouter_departement');

Route::get('/editer_departement', function () {
    return view('departements.editer');
})->name('editer_departement');

Route::get('/lister_departement', function () {
    return view('departements.liste');
})->name('lister_departement');

//rôles
Route::get('/ajouter_role', function () {
    return view('roles.ajouter');
})->name('ajouter_role');

Route::get('/editer_role', function () {
    return view('roles.editer');
})->name('editer_role');

Route::get('/lister_role', function () {
    return view('roles.liste');
})->name('lister_role');

//postes
Route::get('/ajouter_poste', function () {
    return view('postes.ajouter');
})->name('ajouter_role');

Route::get('/editer_poste', function () {
    return view('postes.editer');
})->name('editer_role');

Route::get('/lister_poste', function () {
    return view('postes.liste');
})->name('lister_role');

//permissions

Route::get('/ajouter_permission', function () {
    return view('permissions.ajouter');
})->name('ajouter_permission');

Route::get('/editer_permission', function () {
    return view('permissions.editer');
})->name('editer_permission');

Route::get('/lister_permission', function () {
    return view('permissions.liste');
})->name('lister_permission');




require __DIR__.'/auth.php';
