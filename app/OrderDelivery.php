<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    protected $fillable = [
        'id', 'txn_id', 'booking_agent', 'destination_agent', 'security_guard', 'assigned_by', 'order_status', 'status'
    ];
}
