<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'hc_admins';
    protected $primaryKey = 'admin_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $filable = [
        'admin_name', 'password', 'admin_email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'admin_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'hc_admins_roles', 'admin_id', 'role_id');
    }

    public function hasAnyRoles($roles)
    {
        return null !== $this->roles()->whereIn('role_name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('role_name', $role)->first();
    }
}
