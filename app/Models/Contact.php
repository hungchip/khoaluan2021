<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'hc_contacts';
    protected $primaryKey = 'contact_id';
    
    protected $filable = [
        'contact_name', 'contact_email', 'contact_phone', 'contact_content', 'status'
    ];
}
