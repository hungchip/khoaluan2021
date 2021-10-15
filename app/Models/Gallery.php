<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'hc_gallerys';
    protected $primaryKey = 'gallery_id';

    protected $fields = [
        'image',
    ];

}
