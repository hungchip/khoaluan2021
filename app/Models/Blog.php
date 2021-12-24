<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'hc_blogs';
    protected $primaryKey = 'blog_id';
    
    protected $filable = [
        'title', 'admin_id', 'content', 'quote',
    ];

    protected $hidden = [
        '_token',
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }
}
