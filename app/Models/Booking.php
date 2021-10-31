<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'hc_bookings';
    protected $primaryKey = 'booking_id';

    protected $fields = [
        'room_id', 'guest_id','checkin', 'checkout',
    ];

    // public function rooms()
    // {
    //     return $this->hasMany('App\Models\Room', 'booking_id');
    // }

    public function guest()
    {
        return $this->belongsTo('App\Models\Room', 'booking_id');
    }
}
