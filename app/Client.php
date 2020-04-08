<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Client extends Authenticatable
{
    public $fillable = ["name","email","telephone","password"];

    protected $hidden = [
        'password', 'api_token',
    ];
}
