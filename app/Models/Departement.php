<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{

    protected $fillable = ['name'];
    public function positions() {
        return $this->hasMany(Poste::class);
    }

}
