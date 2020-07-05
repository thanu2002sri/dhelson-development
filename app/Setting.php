<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'id', 'app_version', 'month_start_date', 'month_end_date', 'status'
    ];
}
