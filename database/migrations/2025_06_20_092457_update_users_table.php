<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('tenant_id')->after('id');
            $table->foreignId('departement_id')->constrained()->onDelete('restrict');
            $table->foreignId('poste_id')->constrained()->onDelete('restrict');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('address', 500);
            $table->string('phone');
            $table->enum('contract_type', ['CDI', 'CDD', 'Intérim']);
            $table->date('hire_date');
            $table->string('social_security_number')->encrypted();
            $table->string('rib')->encrypted();
            $table->json('documents')->nullable();
            $table->enum('status', ['Actif', 'Inactif', 'En congé']);
        });
    }
    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'tenant_id', 'departement_id', 'postes_id', 'first_name', 'last_name',
                'birth_date', 'address', 'phone', 'contract_type', 'hire_date',
                'social_security_number', 'rib', 'documents', 'status'
            ]);
        });
    }
};
