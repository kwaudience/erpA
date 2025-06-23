<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Poste extends Model
{
    protected $fillable = ['department_id', 'name'];
    public function department() {
        return $this->belongsTo(Departement::class);
    }
    public function roles() {
        return $this->hasMany(Role::class);
    }
}
