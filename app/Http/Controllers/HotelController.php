<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function all()
    {
        return Hotel::all();
    }
    public function show(Hotel $hotel)
    {
        return $hotel;
    }
}
