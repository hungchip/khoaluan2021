<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'hc_blogs';
    protected $primaryKey = 'blog_id';

    protected $fields = [
        'image',
    ];

}
