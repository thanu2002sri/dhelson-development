<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $fillable = [
        'id', 'category', 'name', 'status'
    ];
}
