<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'hc_bookings';
    protected $primaryKey = 'booking_id';

    protected $fields = [
        'booking_id', 'room_id', 'guest_id', 'checkin', 'checkout', 'amount', 'status',
    ];

    public function bookingDetails()
    {
        return $this->hasMany('App\Models\BookingDetail', 'booking_id');
    }

    public function guest()
    {
        return $this->belongsTo('App\Models\Guest', 'guest_id');
    }

    // public function rooms()
    // {
    //     return $this->belongsToMany('App\Models\Room', 'hc_bookings_rooms_id', 'booking_id', 'room_id');
    // }
}
