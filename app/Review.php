<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $fillable = ["hotel_id","client_id","stars"];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
