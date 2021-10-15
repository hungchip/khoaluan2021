<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'hc_rooms';
    private $primaryKey = 'room_id';

    protected $fields = [
        'room_type_id', 'room_adult', 'room_child',
    ];

    public function room()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }
}
