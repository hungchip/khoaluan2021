<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'hc_guests';
    protected $primaryKey = 'guest_id';

    protected $fields = [
        'email', 'name', 'address', 'phone', 'id_card',
    ];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking', 'booking_id');
    }
}
