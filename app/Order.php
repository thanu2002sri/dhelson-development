<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'txn_id', 'tacking_id', 'booking_agent', 'destination_agent', 'consigner_name', 'consigner_email', 'consigner_phone', 'consigner_photo', 'consigner_aadhar', 'consigner_signature', 'consignee_name', 'consignee_phone', 'consignee_id', 'consignee_signature', 'shipment_name', 'shipment_img', 'shipment_descritpion', 'insured_start_date', 'insured_end_date', 'insured_value', 'amount', 'tax', 'total_amount', 'otp', 'otp_status', 'booking_latitude', 'booking_longtitude', 'destination_latitude', 'destination_longtitude', 'customer_care_signature', 'incharge_signature', 'status'
    ];
}
