<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = [
        'tenant_id', 'departement_id', 'poste_id', 'first_name', 'last_name',
        'birth_date', 'address', 'phone', 'email', 'password', 'contract_type',
        'hire_date', 'social_security_number', 'rib', 'documents', 'status'
    ];
    protected $casts = [
        'password',
        'remember_token',
        'rib' => 'encrypted',
        'social_security_number' => 'encrypted',
        'documents' => 'array',
        'birth_date' => 'date',
        'hire_date' => 'date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'rib' => 'encrypted',
        'social_security_number' => 'encrypted',
        'documents' => 'array',
        'birth_date' => 'date',
        'hire_date' => 'date'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function departement() {
        return $this->belongsTo(Departement::class);
    }
    public function poste() {
        return $this->belongsTo(Poste::class);
    }
    public function restrictions() {
        return $this->belongsToMany(\Spatie\Permission\Models\Permission::class, 'user_permission_restrictions')
                    ->withPivot('expiration_date')
                    ->withTimestamps();
    }
    public function hasRestrictedPermission($permission) {
        return $this->restrictions()->where('permission_id', $permission)->where(function ($query) {
            $query->whereNull('expiration_date')->orWhere('expiration_date', '>=', now());
        })->exists();
    }
    public function hasPermissionTo($permission, $guardName = null) {
        if ($this->hasRestrictedPermission($permission)) {
            return false;
        }
        return parent::hasPermissionTo($permission, $guardName);
    }
    public function getDocumentsAttribute($value) {
        return json_decode($value, true) ?? [];
    }
    public function setDocumentsAttribute($value) {
        $this->attributes['documents'] = json_encode($value);
    }
}
