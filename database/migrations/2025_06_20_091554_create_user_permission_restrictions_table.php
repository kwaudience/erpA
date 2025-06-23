<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up() {
        Schema::create('user_permission_restrictions', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->date('expiration_date')->nullable();
            $table->primary(['user_id', 'permission_id']);
            $table->timestamps();
        });
    }
    
    public function down() {
        Schema::dropIfExists('user_permission_restrictions');
    }
};
