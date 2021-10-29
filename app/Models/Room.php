<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'hc_rooms';
    protected $primaryKey = 'room_id';

    protected $fields = [
        'room_type_id', 'room_adult', 'room_child', 'room_status',
    ];

    public function roomType()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'room_type_id');
    }
}
