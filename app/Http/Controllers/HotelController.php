<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Review;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function all()
    {
        return Hotel::all();
    }
    public function show(Hotel $hotel)
    {
        return $hotel->withCount("totalVotes")->get();
    }
    public function search(Request $request,$search)
    {
        $minPrice =  $request->get("minPrice");
        $minStars =  $request->get("minStars");
        $maxPrice =  $request->get("maxPrice");
        return Hotel::where("address","like","%".$search."%")
        ->where("price",">=",$minPrice)->get();
    }

}
