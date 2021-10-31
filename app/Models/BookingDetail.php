<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $table = 'hc_booking_details';
    protected $primaryKey = 'booking_detail_id';

    protected $fields = [
        'amount',
    ];

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id');
    }

    public function roomTypes()
    {
        return $this->hasOne('App\Models\RoomType', 'room_type_id');
    }
}
