<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class OauthAccessToken extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id', 'profile_id', 'client_id', 'name', 'scopes', 'expires_at'
    ];
}
