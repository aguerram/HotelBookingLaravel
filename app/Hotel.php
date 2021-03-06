<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $fillable = ["title","siteweb","phone","price","address","description","cover","stars"];

    public function totalVotes()
    {
        return $this->hasMany(\App\Review::class);
    }
}
