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

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
