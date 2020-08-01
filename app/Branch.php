<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'id', 'agent_id', 'email', 'phone', 'address', 'pincode', 'city', 'state', 'country', 'lattitude', 'logtitude', 'status'
    ];
}
