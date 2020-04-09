<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $fillable = ["hotel_id","client_id","guests","from","to"];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
