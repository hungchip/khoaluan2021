<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'hc_services';
    protected $primaryKey = 'service_id';

    protected $fields = [
        'service_name',
        'service_price',
        'unit'
    ];
}
