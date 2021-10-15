<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListImage extends Model
{
    protected $table = 'hc_list_images';
    protected $primaryKey = 'list_image_id';

    protected $fields = [
        'link',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'room_type_id');
    }
}
