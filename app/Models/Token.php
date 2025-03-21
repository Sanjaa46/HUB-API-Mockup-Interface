<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'client_id',
        'access_token',
        'expires_at'
    ];
}