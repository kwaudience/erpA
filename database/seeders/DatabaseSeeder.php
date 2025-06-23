<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poste;
use App\Models\Departement;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $roles = ['Admin', 'RH', 'Manager', 'Employé', 'Comptable'];
        foreach ($roles as $role) {
            Role::create(['name' => $role, 'guard_name' => 'web']);
        }

        // Créer une permission
        Permission::create(['name' => 'informatique.factures.modifier', 'guard_name' => 'web']);

        // Assigner la permission au rôle Comptable
        $role = Role::findByName('Comptable', 'web');
        $role->givePermissionTo('informatique.factures.modifier');

        // Créer un département et un poste
        $dept = Departement::create(['name' => 'Marketing']);
        $pos = Poste::create(['departement_id' => $dept->id, 'name' => 'Marketing']);

        // Créer un utilisateur admin
        $admin = User::create([
            'tenant_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'status' => 'Actif',
            'departement_id' => 2,
            'poste_id' => 1,
            // 'access_level' => 'Admin'
        ]);
        $admin->assignRole('Admin');

        // Créer un utilisateur comptable
        $user = User::create([
            'tenant_id' => 1,
            'first_name' => 'Jean',
            'last_name' => 'Dupont',
            'email' => 'jean@example.com',
            'password' => Hash::make('password'),
            'status' => 'Actif',
            'departement_id' => $dept->id,
            'poste_id' => $pos->id,
            'role' => 'Comptable'
        ]);
        $user->assignRole('Comptable');
        $user->restrictions()->attach(1, ['expiration_date' => '2025-12-31']);
    }
}
