<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'hc_roles';
    protected $primaryKey = 'role_id';
    protected $filable = [
        'role_name',
    ];

    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin', 'hc_admins_roles', 'admin_id', 'role_id');
    }
}
