<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GpsTracking extends Model
{
    protected $fillable = [
        'id', 'user_id', 'pincode', 'city', 'state', 'country', 'lattitude', 'logtitude'
    ];
}
