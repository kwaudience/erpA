<?php

use App\Http\Controllers\GestUser\AdminController;
use App\Http\Controllers\GestUser\DepartementController;
use App\Http\Controllers\GestUser\PermissionController;
use App\Http\Controllers\GestUser\PosteController;
use App\Http\Controllers\GestUser\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/lister_departement', [DepartementController::class, 'departmentsIndex'])->name('lister_departement');
    Route::get('/ajouter_departement', [DepartementController::class, 'departmentsCreate'])->name('ajouter_departement');
    // Route::get('/editer_departement/{id}', [DepartementController::class, 'departmentsCreate'])->name('editer_departement');

    Route::post('/departments', [DepartementController::class, 'departmentsStore'])->name('ajouter_departement.store');
    Route::delete('/departments/{id}', [DepartementController::class, 'departmentsDestroy'])->name('ajouter_departement.destroy');

    Route::get('/postes', [PosteController::class, 'postesIndex'])->name('admin.postes.index');
    Route::post('/postes', [PosteController::class, 'postesStore'])->name('admin.postes.store');

    Route::get('/roles', [RoleController::class, 'rolesIndex'])->name('admin.roles.index');
    Route::post('/roles', [RoleController::class, 'rolesStore'])->name('admin.roles.store');
    Route::get('/roles/{role}/permissions', [RoleController::class, 'rolesPermissions'])->name('admin.roles.permissions');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'rolesPermissionsStore'])->name('admin.roles.permissions.store');
    Route::delete('/roles/{role}', [RoleController::class, 'rolesDestroy'])->name('admin.roles.destroy');

    Route::get('/permissions', [PermissionController::class, 'permissionsIndex'])->name('admin.permissions.index');
    Route::post('/permissions', [PermissionController::class, 'permissionsStore'])->name('admin.permissions.store');

    Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
    Route::get('/users/{user}/permissions', [AdminController::class, 'usersPermissions'])->name('admin.users.permissions');
    Route::post('/users/{user}/permissions/restrict', [AdminController::class, 'usersPermissionsRestrict'])->name('admin.users.permissions.restrict');
    Route::post('/users/{user}/permissions/assign', [AdminController::class, 'usersAssignPermission'])->name('admin.users.assignPermission');



    Route::get('/test-permission', function () {
        return 'Accès autorisé';
    })->middleware('restrict:comptabilite.factures.modifier')->name('admin.test.permission');
});
