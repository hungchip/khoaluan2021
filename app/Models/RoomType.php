<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'hc_room_types';
    protected $primaryKey = 'room_type_id';

    protected $fields = [
        'room_type_name',
        'room_type_price',
        'room_type_desc',
        'room_type_info',
        'quote',
        'avatar',
        'list_image',
        'room_type_amount',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'room_type_id');
    }

    
}

