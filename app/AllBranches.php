<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllBranches extends Model
{
    protected $fillable = [
        'id', 'branch_prefix', 'branch_city', 'branches_count'
    ];
}
