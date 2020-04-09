<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download(Hotel $hotel)
    {
        $hotel = Hotel::find($hotel)->first();
        // return $hotel;
        return response()->download("./storage/".$hotel->cover);
    }
}
